<?php
namespace  App\Services;

use Illuminate\Support\Facades\Storage;

class CourseService
{
    public function addCourse($model , $request , $discount)
    {
        $course = $model->query()->create([
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $request->get('price'),
            'discount' => $discount,
            'created_at' => now(),
        ]);
        $course->addMediaFromRequest('cover')
            ->toMediaCollection('first_year_courses' );
        return $course;
    }
    public function updateCourse($course , $request)
    {
        $discount = null;
        $price = $request->price;
        if ($request->discount != null) {
            $discount = $this->calculateDiscount($request->discount , $price);
        }

        $cover = $course->cover;
        if ($request->has('cover')) {
            $course->setCourseImage($course , 'first_year_courses');
        }
        return $updatedCourse  = $this->courseTransaction($course , $request , $discount);
    }

    public function courseTransaction($course , $request , $discount )
    {
        try {
            $course->update([
                'name' => $request->name,
                'serial_number' => $request->serial_number,
                'price' => $request->price,
                'discount' => $discount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {}
        return $course;
    }

    public function calculateDiscount($discount , $price): float|int
    {
        $newDiscount = ($discount / 100) * ($price);
        return $price - $newDiscount;
    }

    public function setCourseImage($course , $mediaCollection): void
    {
        $course->addMediaFromRequest('cover')->toMediaCollection($mediaCollection);
    }
}

//$cover = handleImage('courses_first_year', $request);

// addMedia( storage_path( 'app/public/'. 'courses_third_year') )->toMediaCollection('courses');

//        $customFolderPath = 'courses_third_year';
//        $customPath = 'public/' . $customFolderPath;
//
//        // Create the folder if it doesn't exist
//        if (!Storage::disk('public')->exists($customFolderPath)) {
//            Storage::disk('public')->makeDirectory($customFolderPath);
//        }
