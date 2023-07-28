<?php
namespace  App\Services;

class CourseService
{
    public function addCourse($model , $request , $discount)
    {
        return $model->query()->create([
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $request->get('price'),
            'cover' => '$cover',
            'discount' => $discount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function calculateDiscount($discount , $price): float|int
    {
        $newDiscount = ($discount / 100) * ($price);
        return $price - $newDiscount;
    }



}
