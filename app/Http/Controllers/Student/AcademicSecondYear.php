<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicSecondYear extends Controller
{
    public function index ()
    {
//        return 'Academic Second Year';
        return view('student.2nd');

    }
}
