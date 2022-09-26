<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseThirdYear;
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

            $subscribed = SubscribedThirdYear::where('student_id',$id)->get();
            $waitingList =  WaitingListThirdYear::where('student_id',$id)->get();
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
        $students = User::where('academic_year',3)->get();
        return view('admin.students.3rd',compact('students'));
    }

    public function showAllCourses()
    {
        $courses = CourseThirdYear::get();
        return view('admin.courses.third_year.index', compact('courses'));
    }

    public function showCourseEditForm($id)
    {
        $course = CourseThirdYear::findorFail($id);
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
            'serial_number' => $serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //view(all_course.3rd)
        return redirect()->route('courses.3rd.students')->with(['success' => ' تم الأشتراك في الكورس سيتم التفعيل عند الدفع ']);
    }

//    function uploadImage($folder, $image): string
//    {
//        $image_name = time() . '.' . $image->extension();
//        $image->move('images/' . $folder, $image_name);
//        return $image_name;
//    }
//
//    public function handleImage($folder, $request): ?string
//    {
//        if ($request->has('cover'))
//            return uploadImage($folder, $request->cover);
//        return $image_name = null;
//    }


}
