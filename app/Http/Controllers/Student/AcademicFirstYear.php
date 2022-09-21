<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFirstYearCourseRrquest;
use Illuminate\Http\Request;
use App\Models\CourseFirstYear;
use Yajra\DataTables\DataTables;

class AcademicFirstYear extends Controller
{
    public function index()
    {
        return view('student.1st');
    }

    //Student View All Courses
    public function courses()
    {
        $courses = CourseFirstYear::get();
        return view('student.all_course.1st', compact('courses'));
    }

    //Admin View All Courses
    public function showAllCourses()
    {
        $courses = CourseFirstYear::get();
        return view('admin.courses.first_year.index', compact('courses'));
    }

    public function showCourseEditForm($id)
    {
        $course = CourseFirstYear::findorFail($id);
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
            $cover = $this->handleImage('courses_first_year',$request);
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

//    public function addedCourses(Request $request)
//    {
//        if ($request->ajax()) {
//            $data = CourseFirstYear::select('*');
//            return DataTables::of($data)->addIndexColumn()->addColumn('action', function () {
//                return $btn = "
//            <a id='editBtn' class='edit btn btn-primary'  href='" . route('edit.1st.course') . "'></a>
//            <a id='deleteBtn' class='delete btn btn-danger '  href='" . route('delete.1st.course') . "'></a>
//            ";
//            })->rawColumns(['action'])->make(true);
//        }
//    }


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
// data-target='#exampleModal' data-toggle='modal'
