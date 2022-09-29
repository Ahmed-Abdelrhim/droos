<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseThirdYear;
use App\Models\LecturesThirdYear;
use App\Models\SubscribedThirdYear;
use App\Models\User;
use App\Models\WaitingListSecondtYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WaitingListThirdYear;
use Illuminate\Support\Facades\Gate;

class AcademicThirdYear extends Controller
{
    public function index ()
    {
        return view('student.3rd');

    }

    public function courses()
    {
        $courses = CourseThirdYear::get();
        if(Auth::check())
        {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;

            if(!Gate::allows('view-courses',3))
                return view('student.access_denied',compact('academic_year'));

            $subscribed = SubscribedThirdYear::orderBy('id', 'asc')->where('student_id',$id)->get();
            $waitingList =  WaitingListThirdYear::orderBy('id', 'asc')->where('student_id',$id)->get();
            if(count($subscribed) > 0 || count($waitingList) > 0)
            {
                //If Student Already Subscribed In The Course
                foreach ($subscribed as $sub)
                {
                    $serials[] = $sub->serial_number;
                }

                // If Student In The Waiting List Of The Course
                foreach ($waitingList as $waiting)
                {
                    $serials[] = $waiting->serial_number;
                }

                return view('student.all_course.3rd',compact('courses','serials'));
            }
            //Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.3rd',compact('courses'));
        }
        return view('student.all_course.3rd',compact('courses'));
    }

    public function allStudents()
    {
        $students = User::orderBy('id', 'asc')->where('academic_year',3)->get();
        return view('admin.students.3rd',compact('students'));
    }

    public function showAllCourses()
    {
        $courses = CourseThirdYear::orderBy('id', 'asc')->get();
        return view('admin.courses.third_year.index', compact('courses'));
    }

    public function showCourseEditForm($id)
    {
        $course = CourseThirdYear::find($id);
        if (!$course)
            return 'Course Not Found';
        return view('admin.courses.third_year.update', compact('course'));

    }

    public function updateCourse(Request $request, $id)
    {
        //|unique:course_first_years,name'.$id
        $course = CourseThirdYear::find($id);
        if(!$course)
            return redirect()->back()->with(['errors' => 'Course Not Found']);
        $this->validate($request, [
            'name' => 'required',
            'serial_number' => 'required ',
            'price' => 'required',
            'discount' => 'nullable ',
            'cover' => 'nullable ',
        ]);

        $discount = null;
        $price = $request->price;
        if ($request->discount != null) {
            $dis = ($request->discount / 100) * ($request->price);
            $discount = $request->discount;
            $price = $request->price - $dis;
        }

        $cover = $course->cover;
        if($request->has('cover'))
        {
            $cover = handleImage('courses_third_year',$request);
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

    public function deleteCourse($id)
    {
        $course = CourseThirdYear::findOrFail($id);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id)
    {
        $course = CourseThirdYear::findOrFail($id);
        return view('student.to_subscribe.3rd',compact('course'));
    }

    public function subscribeCourseNow($id)
    {
        $student_id = Auth::user()->id;
        $course = CourseThirdYear::findOrFail($id);
        $serial_number = $course->serial_number;
        WaitingListThirdYear::create([
            'student_id' => $student_id,
            'course_id' => $course->id,
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.3rd)
        return redirect()->route('courses.3rd.students')->with(['success' => 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع']);
    }

    public function deleteSubscription($id)
    {
        $subscription = SubscribedThirdYear::find($id);
        if(!$subscription)
            return 'Subscription Not Found';
        $subscription->delete();
        return redirect()->back()->with(['success' => 'subscription deleted successfully']);
    }

    public function enrolledCoursesView()
    {
        $courses = SubscribedThirdYear::orderBy('serial_number','asc')->where('student_id',Auth::id())->with('course')->get();
        return view('student.enrolled.third.index',compact('courses'));
    }

    public function getLectures()
    {
        $allData = LecturesThirdYear::paginate(10);
        return view('admin.lectures.3rd',compact('allData'));
    }

    public function deleteLecture($id)
    {
        $lec = LecturesThirdYear::find($id);
        if(!$lec)
            return 'Lecture Not Found';
        $lec->delete();
        return redirect()->back()->with(['success' => 'Lecture deleted successfully']);
    }

    public function viewWeeksPage($id)
    {
        $course= CourseThirdYear::with('lectures')->find($id);
        if(!$course)
            return view('student.access_denied');
        return view('student.enrolled.third.week',compact('course'));

    }

    public function viewEnrolledCourse($id)
    {
        $lec = LecturesThirdYear::with('course')->find($id);
        if(!$lec)
            return view('student.access_denied');
        return view('student.enrolled.third.lecture',compact('lec'));
    }

}
