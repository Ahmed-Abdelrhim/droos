<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicThirdYear extends Controller
{
    public function index ()
    {
//        return 'Academic Third Year';
        return view('student.3rd');

    }
}
