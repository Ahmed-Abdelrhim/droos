<?php

namespace App\Http\Livewire;
use App\Models\CourseFirstYear;
use App\Models\CourseSecondYear;
use App\Models\CourseThirdYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCourse extends Component
{
    use WithFileUploads;

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

        $price = $this->price;
        if ($this->discount != null) {
            $price = $this->price -  (($this->discount / 100 ) * $this->price);
        }
        try {
            DB::beginTransaction();
            if($this->academic_year == 3) {
                CourseThirdYear::query()->create([
                    'name' => $this->name,
                    'serial_number' => $this->month,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $this->discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            if($this->academic_year == 2) {
                CourseSecondYear::query()->create([
                    'name' => $this->name,
                    'serial_number' => $this->month,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $this->discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            if($this->academic_year == 1) {
                CourseFirstYear::query()->create([
                    'name' => $this->name,
                    'serial_number' => $this->month,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $this->discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            session()->flash('errors' ,'something went wrong');
            DB::rollBack();
        }
        session()->flash('success' ,'course added successfully');
    }

}
