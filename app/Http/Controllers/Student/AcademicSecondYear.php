<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\LecturesRequest;
use App\Models\CourseSecondYear;
use App\Models\Demo;
use App\Models\HomeWorkSecondYear;
use App\Models\LecturesSecondYear;
use App\Models\QuizSecondYear;
use App\Models\SubscribedSecondYear;
use App\Models\User;
use App\Models\WaitingListSecondtYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AcademicSecondYear extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // $demo = Demo::query()->where('academic_year', '=', 2)->first();
        $demo = Cache::get('demo_second_year');
        if (empty($demo))
            $demo = Demo::query()->where('academic_year', '=', 2)->first();
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        return view('student.2nd',['demo' => $demo]);
    }

    public function courses(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = CourseSecondYear::get();
        if (Auth::check()) {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;

            if (!Gate::allows('view-courses', 2))
                return view('errors.404');

            $subscribed = SubscribedSecondYear::orderBy('id', 'asc')->where('student_id', $id)->get();
            $waitingList = WaitingListSecondtYear::orderBy('id', 'asc')->where('student_id', $id)->get();
            if (count($subscribed) > 0 || count($waitingList) > 0) {
                //If Student Already Subscribed In The Course
                foreach ($subscribed as $sub) {
                    $serials[] = $sub->serial_number;
                }

                // If Student In The Waiting List Of The Course
                foreach ($waitingList as $waiting) {
                    $serials[] = $waiting->serial_number;
                }

                return view('student.all_course.2nd', compact('courses', 'serials'));
            }
            //Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.2nd', compact('courses'));

            // If Student In The Waiting List Of The Course
//            $waitingList =  WaitingListSecondtYear::where('student_id',$id)->get();
//            if(count($waitingList) > 0)
//            {
//                foreach ($waitingList as $waiting)
//                {
//                    $serials[] = $waiting->serial_number;
//                }
//                return view('student.all_course.2nd',compact('courses','serials'));
//            }
        }
        return view('student.all_course.2nd', compact('courses'));
    }

    public function allStudents(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $students = User::orderBy('id', 'asc')->where('academic_year', 2)->paginate(7);
        return view('admin.students.2nd', compact('students'));
    }


    public function showAllCourses(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = CourseSecondYear::orderBy('id', 'asc')->get();
        return view('admin.courses.second_year.index', compact('courses'));
    }

    public function showCourseEditForm($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|string|\Illuminate\Contracts\Foundation\Application
    {
        $course = CourseSecondYear::find($id);
        if (!$course)
            return 'Course Not Found';
        return view('admin.courses.second_year.update', compact('course'));

    }

    public function updateCourse(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        //|unique:course_first_years,name'.$id
        $course = CourseSecondYear::find($id);
        if (!$course)
            return redirect()->back()->with(['errors' => 'Course Not Found']);
        $this->validate($request, [
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
            $cover = handleImage('courses_second_year', $request);
        }

        $course->update([
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $price,
            'cover' => $cover,
            'discount' => $discount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with(['success' => 'تم تعديل الكورس بنجاح']);

    }

    public function deleteCourse($id): string|\Illuminate\Http\RedirectResponse
    {
        $course = CourseSecondYear::find($id);
        if (!$course)
            return 'Course Not Found To Be Deleted';
        $file_path = 'images/courses_second_year/'.$course->cover;
        //unlink($file_path);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $course = CourseSecondYear::query()->find($id);
        if (!$course)
            return view('errors.404');
        return view('student.to_subscribe.2nd', compact('course'));
    }

    public function subscribeCourseNow($id): \Illuminate\Http\RedirectResponse
    {
        $student = Auth::user();
        $student_id = $student->id;
        if ($student->academic_year != 2)
            return redirect()->back()->with(['errors' => ' يجب أن تكون في الصف الثاني الثانوي حتي تستطيع الاشتراك في الكورس']);
        $course = CourseSecondYear::findOrFail($id);
        $serial_number = $course->serial_number;

        $already_exists = WaitingListSecondtYear::where('student_id' ,'=',$student_id)->where('course_id','=',$course->id)
            ->where('serial_number','=',$serial_number)->first();
        if($already_exists)
            return redirect()->route('courses.2nd.students')->with(['success' => 'انت بالفعل مشترك سيتم تفعيل الكورس عند الدفع']);


        WaitingListSecondtYear::create([
            'student_id' => $student_id,
            'course_id' => $course->id,
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.2nd)
        return redirect()->route('courses.2nd.students')->with(['success' => 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع']);
    }

    public function deleteSubscription($id): string|\Illuminate\Http\RedirectResponse
    {
        $subscription = SubscribedSecondYear::find($id);
        if (!$subscription)
            return 'Subscription Not Found';
        $subscription->delete();
        return redirect()->back()->with(['success' => 'subscription deleted successfully']);
    }

    public function enrolledCoursesView(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = SubscribedSecondYear::orderBy('serial_number', 'asc')->where('student_id', Auth::id())->with('course')->get();
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        return view('student.enrolled.second.index', compact('courses'));
    }

    public function getLectures(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $allData = LecturesSecondYear::paginate(10);
        return view('admin.lectures.2nd', compact('allData'));
    }

    public function updateLectureForm($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|string|\Illuminate\Contracts\Foundation\Application
    {
        $lec = LecturesSecondYear::find($id);
        if(!$lec)
            return 'Lecture Not Found To Be Updated';
        return view('admin.lectures.2nd_updte',compact('lec'));
    }

    public function updateLecture(LecturesRequest $request , $id): string|\Illuminate\Http\RedirectResponse
    {
        $lecture = LecturesSecondYear::find($id);
        if (!$lecture)
            return 'lecture not found to be updated';
        $video_name = $lecture->lec;
        if($request->has('lec'))
            $video_name = uploadLecture('second', $request->lec);

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
        return redirect()->back()->with(['success' => 'lecture 2nd year updated successfully']);

    }

    public function deleteLecture($id): string|\Illuminate\Http\RedirectResponse
    {
        $lec = LecturesSecondYear::find($id);
        if (!$lec)
            return 'Lecture Not Found';
        //$file_path = Storage::disk('public')->get('third/'.$lec->lec);
        //unlink($file_path);
        $lec->delete();
        return redirect()->back()->with(['success' => 'Lecture deleted successfully']);
    }

    public function viewWeeksPage($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $course = CourseSecondYear::with('lectures')->find($id);
//        return $course['lectures'];
        if (!$course)
            return view('student.access_denied');

//        $lectures1 = $course['lectures']->where('week', 1);
//        $lectures2 = $course['lectures']->where('week', 2);
//        $lectures3 = $course['lectures']->where('week', 3);
//        $lectures4 = $course['lectures']->where('week', 4);



//        $week1 = $course['homework']->where('week', 1);
//        $week2 = $course['homework']->where('week', 2);
//        $week3 = $course['homework']->where('week', 3);
//        $week4 = $course['homework']->where('week', 4);
//
//        $quiz1 = $course['quiz']->where('week', 1);
//        $quiz2 = $course['quiz']->where('week', 2);
//        $quiz3 = $course['quiz']->where('week', 3);
//        $quiz4 = $course['quiz']->where('week', 4);


        return view('student.enrolled.second.week', compact('course'));
//        return view('student.enrolled.second.week', compact('course', 'week1', 'week2', 'week3', 'week4'
//            , 'quiz1', 'quiz2', 'quiz3', 'quiz4', 'lectures1', 'lectures2', 'lectures3', 'lectures4'));
    }

    public function viewEnrolledCourse($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $lec = LecturesSecondYear::with('course')->find($id);
        if (!$lec)
            return view('student.access_denied');
        $user = Auth::user();
        $user->mac_address = 1;
        $user->save();
        return view('student.enrolled.second.lecture', compact('lec'));
    }

    public function getHomeWork(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $homeworks = HomeWorkSecondYear::with('course')->paginate(10);
        return view('admin.homework.2nd', compact('homeworks'));
    }

    public function deleteHomeWork($id): string|\Illuminate\Http\RedirectResponse
    {
        $homework = HomeWorkSecondYear::find($id);
        if (!$homework)
            return 'Home Work Not Found';
        $homework->delete();
        return redirect()->back()->with(['success' => 'home work deleted successfully']);
    }

    public function viewStudentHomeWork($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $homework = LecturesSecondYear::find($id)->homework;
        return view('student.enrolled.second.homework', compact('homework'));
    }

    public function getQuiz(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $quizzes = QuizSecondYear::with('course')->paginate(10);
        return view('admin.quiz.2nd', compact('quizzes'));
    }

    public function deleteQuiz($id): string|\Illuminate\Http\RedirectResponse
    {
        $quiz = QuizSecondYear::find($id);
        if (!$quiz)
            return 'Home Work Not Found';
        $quiz->delete();
        return redirect()->back()->with(['success' => 'quiz deleted successfully']);
    }

    public function viewStudentQuiz($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $quiz = LecturesSecondYear::find($id)->quiz;
        return view('student.enrolled.second.quiz', compact('quiz'));
    }

}
