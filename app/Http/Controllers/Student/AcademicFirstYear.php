<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\LecturesRequest;
// use App\Http\Requests\UpdateFirstYearCourseRrquest;
use App\Http\Requests\UpdateCourseFirstYear;
use App\Models\Demo;
use App\Models\HomeWorkFirstYear;
use App\Models\LecturesFirstYear;
use App\Models\QuizFirstYear;
use App\Models\SubscribedFirstYear;
use App\Models\User;
use App\Models\WaitingListFirstYear;
use App\Services\CourseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\CourseFirstYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
use App\Traits\Datatable;

class AcademicFirstYear extends Controller
{
    use Datatable;
    private CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index(): View
    {
        $demo = Cache::get('demo_first_year');
        if (empty($demo))
            $demo = Demo::query()->where('academic_year', '=', 1)->first();
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        return view('student.1st', ['demo' => $demo]);
    }

    //Student or anyone View All Courses
    public function courses(): Factory|View|Application
    {
        $courses = CourseFirstYear::query()->get();
        if (Auth::check()) {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;
            if (!Gate::allows('view-courses', 1))
                return view('errors.404');

            $subscribed = SubscribedFirstYear::query()->orderBy('id', 'asc')->where('student_id', $id)->get();
            $waitingList = WaitingListFirstYear::query()->orderBy('id', 'asc')->where('student_id', $id)->get();

            if (count($subscribed) > 0 || count($waitingList) > 0) {
                //If Student Already Subscribed In The Course
                foreach ($subscribed as $sub) {
                    $serials[] = $sub->serial_number;
                }

                // If Student In The Waiting List Of The Course
                foreach ($waitingList as $waiting) {
                    $serials[] = $waiting->serial_number;
                }

                return view('student.all_course.1st', compact('courses', 'serials'));
            }
            //Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.1st', compact('courses'));
        }
        return view('student.all_course.1st', compact('courses'));
    }

    public function allStudents(): View
    {
        return view('admin.students.1st');
    }

    public function studentsDataTable()
    {
        $students = User::query()
            ->orderBy('id', 'asc')
            ->where('academic_year', '=', 1)
            ->get();
        return $this->getStudentsFromDataTable($students);
    }

    //Admin[only] View All Courses
    public function showAllCourses()
    {
        $courses = CourseFirstYear::query()
            ->with('media')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.courses.first_year.index', ['courses' => $courses]);
    }

    public function showCourseEditForm($id): View|Factory|string|Application
    {
        $id = decrypt($id);
        $course = CourseFirstYear::query()->find($id);
        if (!$course) {
            return 'Course Not Found';
        }
        return view('admin.courses.first_year.update', ['course' => $course]);

    }

    public function updateCourse(UpdateCourseFirstYear $request, $id): RedirectResponse
    {
        $id = decrypt($id);
        $request->validated();
        $course = CourseFirstYear::query()->find($id);
        if (!$course) {
            $notifications = array('message' => 'Course Not Found', 'alert-type' => 'error');
            return redirect()->back()->with($notifications);
        }

        $this->courseService->updateCourse($course , $request);
        $notifications = array('message' => 'Course Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('all.courses.1st')->with($notifications);

    }

    public function deleteCourse($id): string|RedirectResponse
    {
        $course = CourseFirstYear::query()->find($id);
        if (!$course) {
            return 'Course Not Found To Be Deleted';
        }
        $file_path = 'images/courses_first_year/' . $course->cover;
        // unlink($file_path);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id): Factory|View|Application
    {
        $course = CourseFirstYear::query()->find($id);
        if (!$course)
            return view('errors.404');
        return view('student.to_subscribe.1st', compact('course'));
    }

    public function subscribeCourseNow($id): RedirectResponse
    {
        $student = Auth::user();
        $student_id = $student->id;
        if ($student->academic_year != 1)
            return redirect()->back()->with(['errors' => ' يجب أن تكون في الصف الثاني الثانوي حتي تستطيع الاشتراك في الكورس']);
        $course = CourseFirstYear::findOrFail($id);
        $serial_number = $course->serial_number;


        $already_exists = WaitingListFirstYear::where('student_id', '=', $student_id)->where('course_id', '=', $course->id)
            ->where('serial_number', '=', $serial_number)->first();
        if ($already_exists)
            return redirect()->route('courses.1st.students')->with(['success' => 'انت بالفعل مشترك سيتم تفعيل الكورس عند الدفع']);


        WaitingListFirstYear::create([
            'student_id' => $student_id,
            'course_id' => $course->id,
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.1st)
        // في الكورس
        return redirect()->route('courses.1st.students')->with(['success' => 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع']);
    }

    public function deleteSubscription($id): string|RedirectResponse
    {
        $subscription = SubscribedFirstYear::find($id);
        if (!$subscription)
            return 'Subscription Not Found';
        $subscription->delete();
        return redirect()->back()->with(['success' => 'subscription deleted successfully']);
    }

    public function enrolledCoursesView(): Factory|View|Application
    {
        $enrolled = SubscribedFirstYear::orderBy('serial_number', 'asc')->where('student_id', Auth::id())->with('course')->get();
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        return view('student.enrolled.first.index', compact('enrolled'));
    }

    public function getLectures(): Factory|View|Application
    {
        $allData = LecturesFirstYear::paginate(10);
        return view('admin.lectures.1st', compact('allData'));
    }

    public function deleteLecture($id): string|RedirectResponse
    {
        $lec = LecturesFirstYear::find($id);
        if (!$lec)
            return 'Lecture Not Found';
        //$file_path = Storage::disk('public')->get('third/'.$lec->lec);
        //unlink($file_path);
        $lec->delete();
        return redirect()->back()->with(['success' => 'Lecture deleted successfully']);
    }

    public function updateLectureForm($id): View|Factory|string|Application
    {
        $lec = LecturesFirstYear::find($id);
        if (!$lec)
            return 'Lecture Not Found To Be Updated';
        return view('admin.lectures.1st_update', compact('lec'));
    }

    public function updateLecture(LecturesRequest $request, $id): string|RedirectResponse
    {
        $lecture = LecturesFirstYear::find($id);
        if (!$lecture)
            return 'lecture not found to be updated';
        $video_name = $lecture->lec;
        if ($request->has('lec'))
            $video_name = uploadLecture('first', $request->lec);

        $lecture->update([
            'name' => $request->name,
            'lec' => $video_name,
            'homework' => $request->homework,
            'quiz' => $request->quiz,
            'course_id' => $lecture->course_id,
            'serial_number' => $lecture->serial_number,
            'week' => $lecture->week,
            'created_at' => now(),
            'updated_at' => now(),]);
        return redirect()->back()->with(['success' => 'lecture 1st year updated successfully']);


    }

    public function viewWeeksPage($id)
    {
        $course = CourseFirstYear::with('lectures')->find($id);
        if (!$course)
            return view('student.access_denied');
//        $week1 = $course['homework']->where('week', 1);
//        $week2 = $course['homework']->where('week', 2);
//        $week3 = $course['homework']->where('week', 3);
//        $week4 = $course['homework']->where('week', 4);
//
//        $quiz1 = $course['quiz']->where('week', 1);
//        $quiz2 = $course['quiz']->where('week', 2);
//        $quiz3 = $course['quiz']->where('week', 3);
//        $quiz4 = $course['quiz']->where('week', 4);

        return view('student.enrolled.first.week', compact('course'));

//        return view('student.enrolled.first.week', compact('course', 'week1', 'week2', 'week3', 'week4'
//            , 'quiz1', 'quiz2', 'quiz3', 'quiz4'));
    }

    public function viewEnrolledCourse($id)
    {
        $lec = LecturesFirstYear::with('course')->find($id);
        if (!$lec) {
            return view('student.access_denied');
        }
        $user = Auth::user();
        $subscribed_student = SubscribedFirstYear::query()
            ->where('student_id', $user->id)
            ->where('course_id', $lec?->course->id)
            ->first();
        if (!$subscribed_student) {
            return view('student.access_denied');
        }
        return view('student.enrolled.first.lecture', compact('lec'));
    }

    public function getHomeWork(): Factory|View|Application
    {
        $homeworks = HomeWorkFirstYear::with('course')->paginate(10);
        return view('admin.homework.1st', compact('homeworks'));
    }

    public function deleteHomeWork($id): string|RedirectResponse
    {
        $homework = HomeWorkFirstYear::query()->find($id);
        if (!$homework)
            return 'Home Work Not Found';
        $homework->delete();
        return redirect()->back()->with(['success' => 'home work deleted successfully']);
    }

    public function viewStudentHomeWork($id): Factory|View|Application
    {
        $homework = LecturesFirstYear::find($id)->homework;
        return view('student.enrolled.first.homework', compact('homework'));
    }

    public function getQuiz(): Factory|View|Application
    {
        $quizzes = QuizFirstYear::with('course')->paginate(10);
        return view('admin.quiz.1st', compact('quizzes'));
    }


    public function deleteQuiz($id): string|RedirectResponse
    {
        $quiz = QuizFirstYear::find($id);
        if (!$quiz)
            return 'Home Work Not Found';
        $quiz->delete();
        return redirect()->back()->with(['success' => 'quiz deleted successfully']);
    }

    public function viewStudentQuiz($id): Factory|View|Application
    {
        $quiz = LecturesFirstYear::find($id)->quiz;
        return view('student.enrolled.first.quiz', compact('quiz'));
    }

}
// data-target='#exampleModal' data-toggle='modal'
