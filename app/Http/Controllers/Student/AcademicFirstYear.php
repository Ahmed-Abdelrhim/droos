<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseFirstYear;
class AcademicFirstYear extends Controller
{
    public function index ()
    {
        return view('student.1st');
    }

    public function courses()
    {
        return CourseFirstYear::get();
    }
}
