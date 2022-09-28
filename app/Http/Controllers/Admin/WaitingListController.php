<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscribedFirstYear;
use App\Models\SubscribedSecondYear;
use App\Models\SubscribedThirdYear;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WaitingListFirstYear;
use App\Models\WaitingListSecondtYear;
use App\Models\WaitingListThirdYear;

//use DataTables;
use Yajra\DataTables\DataTables;

class WaitingListController extends Controller
{
    public function waitingFirstYear(Request $request)
    {
        $allData = WaitingListFirstYear::with('students')->get();
        return view('admin.waiting_list.first.index',compact('allData'));
    }

    public function activateWaitingListFirstYear($id)
    {
        $wait = WaitingListFirstYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedFirstYear::create([
            'student_id' => $wait->student_id,
            'course_id' => $wait->course_id,
            'serial_number' => $wait->serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $this->deleteWaitingListFirstYear($id);
    }

    public function deleteWaitingListFirstYear($id)
    {
        $wait = WaitingListFirstYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        $wait->delete();
        return redirect()->route('waiting.list.1st')->with(['success' => 'success transaction']);
    }

    public function waitingSecondYear()
    {
        $allData = WaitingListSecondtYear::with('students')->get();
        return view('admin.waiting_list.second.index',compact('allData'));

    }

    public function activateWaitingListSecondYear($id)
    {
        $wait = WaitingListSecondtYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedSecondYear::create([
            'student_id' => $wait->student_id,
            'course_id' => $wait->course_id,
            'serial_number' => $wait->serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $this->deleteWaitingListSecondYear($id);
    }

    public function deleteWaitingListSecondYear($id)
    {
        $wait = WaitingListSecondtYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        $wait->delete();
        return redirect()->route('waiting.list.2nd')->with(['success' => 'success transaction']);
    }

    public function waitingThirdYear()
    {
        $allData = WaitingListThirdYear::with('students')->paginate(10);
        return view('admin.waiting_list.third.index',compact('allData'));
    }

    public function activateWaitingListThirdYear($id)
    {
        $wait = WaitingListThirdYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedThirdYear::create([
            'student_id' => $wait->student_id,
            'course_id' => $wait->course_id,
            'serial_number' => $wait->serial_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $this->deleteWaitingListThirdYear($id);
    }

    public function deleteWaitingListThirdYear($id)
    {
        $wait = WaitingListThirdYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        $wait->delete();
        return redirect()->route('waiting.list.3rd')->with(['success' => 'success transaction']);
    }


}
