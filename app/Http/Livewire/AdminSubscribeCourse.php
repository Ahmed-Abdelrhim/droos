<?php

namespace App\Http\Livewire;

use App\Models\SubscribedThirdYear;
use App\Models\WaitingListThirdYear;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminSubscribeCourse extends Component
{
    public $data_id;
    public $errorMsg;

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin-subscribe-course');
    }

    public function accebt()
    {

        $wait = WaitingListThirdYear::query()->find($this->data_id);
//        if(! $wait)
//            dd ('Student Not Found');
        try {

            DB::beginTransaction();
            SubscribedThirdYear::query()->create([
                'student_id' => $wait->student_id,
                'course_id' => $wait->course_id,
                'serial_number' => $wait->serial_number,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            // dd();
            return $this->reject();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->errorMsg = 'something went wrong';
        }
    }

    public function reject(): \Livewire\Event
    {
        $wait = WaitingListThirdYear::query()->find($this->data_id);
        if(! $wait)
            dd ('Student Not Found');
        $wait->delete();
        session()->flash('success','success transaction');
        return $this->emit('taskAdded');
        // return redirect()->route('waiting.list.3rd')->with(['success' => 'success transaction']);
    }
}
