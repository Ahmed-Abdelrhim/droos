<?php
namespace App\Traits;

use Yajra\DataTables\DataTables;

trait Datatable
{
    public function getStudentsFromDataTable($students)
    {
        return Datatables::of($students)
            ->addColumn('name', function ($students) {
                return  '<span style="color: #7367f0;font-size: 15px;font-weight: bold">' . $students->name . '</span>';
            })
            ->addColumn('email', function ($students) {
                return   '<span style="color: #6610f2;font-size: 15px;font-weight: bold">' . $students->email . '</span>';
            })
            ->addColumn('phone_number', function ($students) {
                return '<span style="color: #28c76f;font-size: 15px;font-weight: bold">' . $students->phone_number . '</span>';
            })
            ->addColumn('created_at', function ($students) {
                return '<span style="font-size: 15px;font-weight: bold">' . $students->created_at->format('d-M-Y') . '</span>';
            })
            ->addColumn('action', function ($students) {
                return '<a href="' . route('delete.student', $students->id) . '"  style="color: red;font-size: 21px;" title="Delete Student">
                        <i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
