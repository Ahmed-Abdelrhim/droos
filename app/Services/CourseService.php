<?php
namespace  App\Services;

use Illuminate\Support\Facades\Storage;

class CourseService
{
    public function addCourse($model , $request , $discount)
    {
        // addMedia( storage_path( 'app/public/'. 'courses_third_year') )->toMediaCollection('courses');
        $course = $model->query()->create([
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $request->get('price'),
            'discount' => $discount,
            'created_at' => now(),
            // 'cover' => '$cover',
            // 'updated_at' => now(),
        ]);
        $customPath = Storage::disk('public')->path('courses_third_year');

        $course->addMediaFromRequest('cover')
            ->toMediaCollection('courses', 'public', $customPath);
        return $course;
    }
    public function calculateDiscount($discount , $price): float|int
    {
        $newDiscount = ($discount / 100) * ($price);
        return $price - $newDiscount;
    }



}
