<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCoursesRequest;
use App\Models\CourseFirstYear;
use App\Models\CourseSecondYear;
use App\Models\CourseThirdYear;
use App\Services\CourseService;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class CourseController extends Controller
{
    private CourseService $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function showCoursesAddForm()
    {
        return view('admin.courses.add');
    }


    public function addCourses(AddCoursesRequest $request)
    {
        $academic_year = $request->academic_year;
        if (in_array($academic_year, [1, 2, 3])) {
            $discount = null;
            $oldPrice = $request->price;
            $price = $request->price;
            if ($request->discount != null) {
                $dis = ($request->discount / 100) * ($request->price);
                $discount = $request->discount;
                $price = $request->price - $dis;
            }
            if ($academic_year == 1) {
                $cover = handleImage('courses_first_year', $request);
                CourseFirstYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($academic_year == 2) {
                $cover = handleImage('courses_second_year', $request);
                CourseSecondYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($academic_year == 3) {
                $cover = handleImage('courses_third_year', $request);
                CourseThirdYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return redirect()->back()->with(['success' => 'تم اضافة الكورس بنجاح']);
        }
        return 'يجب ادخال السنة الدراسية صحيحا وأن تكون أولي أو ثانيةأو ثالثة ثانوي';
    }
}
