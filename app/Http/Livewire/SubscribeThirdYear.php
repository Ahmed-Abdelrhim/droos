<?php

namespace App\Http\Livewire;

use App\Models\CourseThirdYear;
use App\Models\WaitingListThirdYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscribeThirdYear extends Component
{
    public $course_id;
    public $course;

    public $errorMsg;

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.subscribe-third-year');
    }

    public function submit()
    {
        $student = Auth::user();
        $course = CourseThirdYear::query()->find($this->course_id);
        if (!$course)
            return view('errors.404');
        $already_exists = WaitingListThirdYear::query()
            ->where('student_id', '=', $course->student_id)
            ->where('course_id', '=', $course->id)
            ->where('serial_number', '=', $course->serial_number)->first();
        if ($already_exists)
            return redirect()->route('courses.3rd.students')->with(['success' => 'انت بالفعل مشترك سيتم تفعيل الكورس عند الدفع']);


        try {
            DB::beginTransaction();
            WaitingListThirdYear::query()->create([
                'student_id' => $student->id,
                'course_id' => $course->id,
                // 'serial_number' => $course->serial_number,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            session()->flash('subscription', 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع');
            // ->with(['success' => 'تم الأضافة الي قائمة الأنتظار سيتم تفعيل الكورس عند الدفع']);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('errors', 'something went wrong');
            $this->errorMsg = 'something went wrong try again later !';
        }
        DB::commit();
    }
}
