<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseSecondYear;
use Illuminate\Http\Request;

class AcademicSecondYear extends Controller
{
    public function index ()
    {
        return view('student.2nd');
    }

    public function courses()
    {
        $courses = CourseSecondYear::get();
        return view('student.all_course.2nd',compact('courses'));

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
            $cover = $this->handleImage('courses_second_year',$request);
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


    function uploadImage($folder, $image): string
    {
        $image_name = time() . '.' . $image->extension();
        $image->move('images/' . $folder, $image_name);
        return $image_name;
    }

    public function handleImage($folder, $request): ?string
    {
        if ($request->has('cover'))
            return $this->uploadImage($folder, $request->cover);
        return $image_name = null;
    }



}
