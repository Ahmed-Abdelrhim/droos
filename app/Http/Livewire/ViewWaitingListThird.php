<?php

namespace App\Http\Livewire;

use App\Models\WaitingListThirdYear;
use Livewire\Component;
use Livewire\WithPagination;

class ViewWaitingListThird extends Component
{
    use WithPagination;
    protected $listeners = ['taskAdded' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $allData = WaitingListThirdYear::with('students')->paginate(10);
        return view('livewire.view-waiting-list-third',['allData' => $allData]);
    }
}
