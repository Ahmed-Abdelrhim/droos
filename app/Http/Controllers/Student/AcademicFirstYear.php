<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFirstYearCourseRrquest;
use App\Models\Demo;
use App\Models\LecturesFirstYear;
use App\Models\SubscribedFirstYear;
use App\Models\User;
use App\Models\WaitingListFirstYear;
use Illuminate\Http\Request;
use App\Models\CourseFirstYear;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;

class AcademicFirstYear extends Controller
{
    public function index()
    {
        $demo = Demo::where('academic_year' , '=' ,1)->first();
        return view('student.1st',compact('demo'));
    }

    //Student or anyone View All Courses
    public function courses()
    {
        $courses = CourseFirstYear::get();
        if(Auth::check())
        {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;
            if(!Gate::allows('view-courses',1))
                return view('student.access_denied',compact('academic_year'));

            $subscribed = SubscribedFirstYear::orderBy('id', 'asc')->where('student_id',$id)->get();
            $waitingList =  WaitingListFirstYear::orderBy('id', 'asc')->where('student_id',$id)->get();

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

                return view('student.all_course.1st',compact('courses','serials'));
            }
            //Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.1st',compact('courses'));
        }
        return view('student.all_course.1st',compact('courses'));
    }

    public function allStudents()
    {
        $students = User::orderBy('id', 'asc')->where('academic_year', '=' ,1)->get();
        return view('admin.students.1st',compact('students'));
    }


    //Admin[only] View All Courses
    public function showAllCourses()
    {
        $courses = CourseFirstYear::orderBy('id', 'asc')->get();
        return view('admin.courses.first_year.index', compact('courses'));
    }

    public function showCourseEditForm($id)
    {
        $course = CourseFirstYear::find($id);
        if (!$course)
            return 'Course Not Found';
        return view('admin.courses.first_year.update', compact('course'));

    }

    public function updateCourse(Request $request, $id)
    {
        //|unique:course_first_years,name'.$id
        $course = CourseFirstYear::findOrFail($id);
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
            $cover = handleImage('courses_first_year',$request);
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
        $course = CourseFirstYear::findOrFail($id);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id)
    {
        $course = CourseFirstYear::findOrFail($id);
        return view('student.to_subscribe.1st',compact('course'));
    }

    public function subscribeCourseNow($id): \Illuminate\Http\RedirectResponse
    {
        $student = Auth::user();
        $student_id = $student->id;
        if($student->academic_year != 1 )
            return redirect()->back()->with(['errors' =>' يجب أن تكون في الصف الثاني الثانوي حتي تستطيع الاشتراك في الكورس']);
        $course = CourseFirstYear::findOrFail($id);
        $serial_number = $course->serial_number;
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

    public function deleteSubscription($id)
    {
        $subscription = SubscribedFirstYear::find($id);
        if(!$subscription)
            return 'Subscription Not Found';
        $subscription->delete();
        return redirect()->back()->with(['success' => 'subscription deleted successfully']);
    }

    public function enrolledCoursesView()
    {
        $enrolled = SubscribedFirstYear::orderBy('serial_number','asc')->where('student_id',Auth::id())->with('course')->get();
        return view('student.enrolled.first.index',compact('enrolled'));
    }

    public function getLectures()
    {
        $allData = LecturesFirstYear::paginate(10);
        return view('admin.lectures.1st',compact('allData'));
    }

    public function deleteLecture($id)
    {
        $lec = LecturesFirstYear::find($id);
        if(!$lec)
            return 'Lecture Not Found';
        $lec->delete();
        return redirect()->back()->with(['success' => 'Lecture deleted successfully']);
    }

    public function viewWeeksPage($id)
    {
        $course= CourseFirstYear::with('lectures')->find($id);
        if(!$course)
            return view('student.access_denied');
        return view('student.enrolled.first.week',compact('course'));
    }

    public function viewEnrolledCourse($id)
    {
        $lec = LecturesFirstYear::with('course')->find($id);
        if(!$lec)
            return view('student.access_denied');
        return view('student.enrolled.first.lecture',compact('lec'));
    }

}
// data-target='#exampleModal' data-toggle='modal'
