<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseSecondYear;
use Illuminate\Http\Request;

class AcademicSecondYear extends Controller
{
    public function index ()
    {
        return view('student.2nda');
    }

    public function courses()
    {
        return CourseSecondYear::get();
    }
}
