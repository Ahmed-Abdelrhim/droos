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
        ]);
        $customFolderPath = 'courses_third_year';
        $customPath = 'public/' . $customFolderPath;

        // Create the folder if it doesn't exist
        if (!Storage::disk('public')->exists($customFolderPath)) {
            Storage::disk('public')->makeDirectory($customFolderPath);
        }


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
