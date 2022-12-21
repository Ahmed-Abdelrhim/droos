<?php

namespace App\Http\Livewire;

use App\Models\CourseThirdYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class AddCourse extends Component
{
    public $name;
    public $academic_year;
    public $price;
    public $month;
    public $discount;
    public $cover;

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4',
            'academic_year' => 'required|between:1,3',
            'price' => 'required|numeric|between:10,1000',
            'month' => 'required|numeric|between:1,12',
            'discount' => 'nullable|numeric|between:10,1000',
            'cover' => 'required|image|max:4024',
        ];
    }

    public function render()
    {
        return view('livewire.add-course');
    }

    public function submit()
    {
        $this->validate();
        $cover = null;

        if ($this->cover != null)
        {
            $cover = Str::random(4) . time() . $this->cover->guessExtension();
            if ($this->academic_year == 3)
                $this->cover->storeAs('courses_third_year',$cover,'public');
            if ($this->academic_year == 2)
                $this->cover->storeAs('courses_second_year',$cover,'public');
            if ($this->academic_year == 1)
                $this->cover->storeAs('courses_first_year',$cover,'public');
        }

        $discount = null;
        if ($this->discount != null) {
            $discount = $this->price -  (($this->discount / 100 ) * $this->price);
        }
        try {
            DB::beginTransaction();
            $done = CourseThirdYear::query()->create([
                'name' => $this->name,
                'serial_number' => $this->month,
                'price' => $this->price,
                'cover' => $cover,
                'discount' => $discount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            session()->flash('errors' ,'something went wrong');
            DB::rollBack();
        }
        session()->flash('success' ,'course added successfully');
    }

}
