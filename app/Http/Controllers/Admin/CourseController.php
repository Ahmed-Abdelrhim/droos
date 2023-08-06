<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCoursesRequest;
use App\Models\CourseFirstYear;
use App\Models\CourseSecondYear;
use App\Models\CourseThirdYear;
use App\Services\CourseService;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

use App\Factory\FirstYear;
use App\Factory\SecondYear;
use App\Factory\ThirdYear;

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
        $request->validated();
        // return $request;
        $academic_year = (string)$request->academic_year;
        if (!in_array($academic_year, [1, 2, 3])) {
            $notifications = array('message' => 'يجب إختيار سنة دراسية صحيحة', 'alert-type' => 'error');
            return redirect()->back()->with($notifications);
        }

        $discount = null;
        if ($request->get('discount') !== null) {
            $discount = $this->courseService->calculateDiscount($request->get('discount'), $request->get('price'));
        }

        $model = match ($academic_year) {
            '1' => (new FirstYear())->create(),
            '2' => (new SecondYear())->create(),
            '3' => (new ThirdYear())->create(),
        };

        $course = $this->courseService->addCourse($model, $request, $discount);

        $notifications = array('message' => 'تم اضافة الكورس بنجاح', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }

}


//            if ($academic_year == 1) {
//                $cover = handleImage('courses_first_year', $request);
//                CourseFirstYear::query()->create([
//                    'name' => $request->name,
//                    'serial_number' => $request->serial_number,
//                    'price' => $price,
//                    'cover' => $cover,
//                    'discount' => $discount,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }

//            if ($academic_year == 2) {
//                $cover = handleImage('courses_second_year', $request);
//                CourseSecondYear::query()->create([
//                    'name' => $request->name,
//                    'serial_number' => $request->serial_number,
//                    'price' => $price,
//                    'cover' => $cover,
//                    'discount' => $discount,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }

//            if ($academic_year == 3) {
//                $cover = handleImage('courses_third_year', $request);
//                CourseThirdYear::query()->create([
//                    'name' => $request->name,
//                    'serial_number' => $request->serial_number,
//                    'price' => $price,
//                    'cover' => $cover,
//                    'discount' => $discount,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }


//            $oldPrice = $request->price;
//            $price = $request->price;
//
//            if ($request->discount != null) {
//                $dis = ($request->discount / 100) * ($request->price);
//                $discount = $request->discount;
//                $price = $request->price - $dis;
//            }
