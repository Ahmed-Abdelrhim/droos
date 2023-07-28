<?php

namespace App\Traits;

use Yajra\DataTables\DataTables;

trait Datatable
{
    public function getStudentsFromDataTable($students)
    {
        return Datatables::of($students)
            ->addColumn('image', function ($student) {
                if (empty($student->getFirstMediaUrl('students')) ) {
                    return '<img src="' . asset('storage/default_image/default.jpg') . '"  class="round" alt="avatar" />';
                }
                return '<img src="' . asset($student->getFirstMediaUrl('students', 'avatar')) . '"  class="round" alt="avatar" />';
            })
            ->addColumn('name', function ($student) {
                return '<span style="color: #7367f0;font-size: 15px;font-weight: bold">' . $student->name . '</span>';
            })
            ->addColumn('email', function ($student) {
                return '<span style="color: #6610f2;font-size: 15px;font-weight: bold">' . $student->email . '</span>';
            })
            ->addColumn('phone_number', function ($student) {
                return '<span style="color: #28c76f;font-size: 15px;font-weight: bold">' . $student->phone_number . '</span>';
            })
            ->addColumn('created_at', function ($student) {
                return '<span style="font-size: 15px;font-weight: bold">' . $student->created_at->format('d-M-Y') . '</span>';
            })
            ->addColumn('action', function ($student) {
                return '<a href="' . route('delete.student', $student->id) . '"  style="color: red;font-size: 21px;" title="Delete Student">
                        <i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
