<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseSecondYear;
use App\Models\SubscribedSecondYear;
use App\Models\User;
use App\Models\WaitingListSecondtYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class AcademicSecondYear extends Controller
{
    public function index ()
    {
        return view('student.2nd');
    }

    public function courses()
    {
        $courses = CourseSecondYear::get();
        if(Auth::check())
        {
            $serials = [];
            $id = Auth::id();
            $academic_year = Auth::user()->academic_year;

            if(!Gate::allows('view-courses',2))
                return view('student.access_denied',compact('academic_year'));

            $subscribed = SubscribedSecondYear::where('student_id',$id)->get();
            $waitingList =  WaitingListSecondtYear::where('student_id',$id)->get();
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

                return view('student.all_course.2nd',compact('courses','serials'));
            }
            //Student Authenticated and not waiting or subscribed in any course
            return view('student.all_course.2nd',compact('courses'));

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
        return view('student.all_course.2nd',compact('courses'));
    }

    public function allStudents()
    {
        $students = User::where('academic_year',2)->get();
        return view('admin.students.2nd',compact('students'));
    }


    public function showAllCourses()
    {
        $courses = CourseSecondYear::get();
        return view('admin.courses.second_year.index', compact('courses'));
    }

    public function showCourseEditForm($id)
    {
        $course = CourseSecondYear::findorFail($id);
        if (!$course)
            return 'Course Not Found';
        return view('admin.courses.second_year.update', compact('course'));

    }

    public function updateCourse(Request $request, $id)
    {
        //|unique:course_first_years,name'.$id
        $course = CourseSecondYear::findOrFail($id);
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
            $cover = handleImage('courses_second_year',$request);
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
        $course = CourseSecondYear::findOrFail($id);
        $course->delete();
        return redirect()->back()->with(['success' => 'تم حذف الكورس ']);
    }

    public function toSubscribeCourse($id)
    {
        $course = CourseSecondYear::findOrFail($id);
        return view('student.to_subscribe.2nd',compact('course'));
    }

    public function subscribeCourseNow($id)
    {
        $student = Auth::user();
        $student_id = $student->id;
        if($student->academic_year != 2 )
            return redirect()->back()->with(['errors' =>' يجب أن تكون في الصف الثاني الثانوي حتي تستطيع الاشتراك في الكورس']);
        $course = CourseSecondYear::findOrFail($id);
        $serial_number = $course->serial_number;
        WaitingListSecondtYear::create([
            'student_id' => $student_id,
            'course_id' => $course->id,
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.2nd)
        return redirect()->route('courses.2nd.students')->with(['success' => ' تم الأشتراك في الكورس سيتم التفعيل عند الدفع ']);
    }

    public function enrolledCoursesView()
    {
        $courses = SubscribedSecondYear::where('student_id',Auth::id())->get();
//        $image = CourseSecondYear::find()
        return view('student.enrolled.second.index',compact('courses'));
    }

    public function viewWeeksPage()
    {
        return view('student.enrolled.second.week');
    }
}
