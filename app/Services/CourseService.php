<?php
namespace  App\Services;

class CourseService
{
    public function addCourse($request)
    {
        $academic_year = $request->academic_year;
        if (!in_array($academic_year, [1, 2, 3])) {
            return 'يجب ادخال السنة الدراسية صحيحا وأن تكون أولي أو ثانيةأو ثالثة ثانوي';
        }

        $discount = null;
        $price = $request->price;
        if ($request->discount != null) {
            $price = $this->calculateDiscount($request->discount , $request->price);
        }
    }
    public function calculateDiscount($discount , $price): float|int
    {
        $newDiscount = ($discount / 100) * ($price);
        return $price - $newDiscount;
    }
}
