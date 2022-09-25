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
        $allData = WaitingListFirstYear::get();
        $student_names = [];
        $student_emails = [];
        $student_phones = [];
        foreach ($allData as $student)
        {
            $student = User::find($student->student_id);
            $student_names[] = $student->name;
            $student_emails[] = $student->email;
            $student_phones[] = $student->phone_number;
        }

//        $all = DataTables::of($allData)->addIndexColumn()->addColumn('action', function () {
//            return $btn = "
//            <a id='editBtn' class='edit btn btn-primary btn-sm'  href='#'></a>
//            <a id='deleteBtn' class='edit btn btn-danger btn-sm' href='#' ></a>
//            ";
//        })->rawColumns(['action'])->make(true);
//        return view('admin.waiting_list.first.index',compact('allData') );
        return view('admin.waiting_list.first.index',compact('allData','student_names','student_emails','student_phones'));

    }

    public function activateWaitingListFirstYear($id)
    {
        $wait = WaitingListFirstYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedFirstYear::create([
            'student_id' => $wait->student_id,
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
        $allData = WaitingListSecondtYear::get();
        $student_names = [];
        $student_emails = [];
        $student_phones = [];
        foreach ($allData as $student)
        {
            $student = User::find($student->student_id);
            $student_names[] = $student->name;
            $student_emails[] = $student->email;
            $student_phones[] = $student->phone_number;
        }
        return view('admin.waiting_list.second.index',compact('allData','student_names','student_emails','student_phones'));
    }

    public function activateWaitingListSecondYear($id)
    {
        $wait = WaitingListSecondtYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedSecondYear::create([
            'student_id' => $wait->student_id,
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
        $allData = WaitingListThirdYear::get();
        $student_names = [];
        $student_emails = [];
        $student_phones = [];
        $student_parent_number = [];
        foreach ($allData as $student)
        {
            $student = User::find($student->student_id);
            $student_names[] = $student->name;
            $student_emails[] = $student->email;
            $student_phones[] = $student->phone_number;
            $student_parent_number[] = $student->parent_phone;
        }
        return view('admin.waiting_list.third.index',compact('allData','student_names','student_emails','student_phones','student_parent_number'));
    }

    public function activateWaitingListThirdYear($id)
    {
        $wait = WaitingListThirdYear::find($id);
        if(!$wait)
            return 'Student Not Found';
        SubscribedThirdYear::create([
            'student_id' => $wait->student_id,
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
