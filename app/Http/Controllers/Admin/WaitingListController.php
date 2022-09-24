<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscribedFirstYear;
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
        $all = DataTables::of($allData)->addIndexColumn()->addColumn('action', function () {
            return $btn = "
            <a id='editBtn' class='edit btn btn-primary btn-sm'  href='#'></a>
            <a id='deleteBtn' class='edit btn btn-danger btn-sm' href='#' ></a>
            ";
        })->rawColumns(['action'])->make(true);
        return view('admin.waiting_list.first.index',compact('allData'));
//        return view('admin.waiting_list.first.index')->with(['allData'=>$allData]);

    }

    public function activateWaitingListFirstYear(Request $request,$id)
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

    }

    public function waitingThirdYear()
    {

    }


}
