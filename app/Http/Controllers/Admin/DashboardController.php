<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\WaitingListFirstYear;
use App\Models\WaitingListSecondtYear;
use App\Models\WaitingListThirdYear;
use App\Models\SubscribedFirstYear;
use App\Models\SubscribedSecondYear;
use App\Models\SubscribedThirdYear;
use App\Models\CourseFirstYear;
use App\Models\CourseSecondYear;
use App\Models\CourseThirdYear;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showTeachers()
    {
        return view('admin.teachers');
    }

    public function play()
    {
        return Auth::guard('admin')->user();
    }

    public function studentsFirstYear()
    {
        return User::where('academic_year',1)->get();
    }

    public function showCourses1stYearForm()
    {
        return view('admin.courses.1st');
    }

    public function storeCourses1stYear()
    {
        CourseFirstYear::create([

        ]);
    }

    public function studentsSecondYear()
    {
        return User::where('academic_year',2)->get();
    }

    public function studentsThirdYear()
    {
        return User::where('academic_year',3)->get();
    }

    public function coursesFirstYear()
    {
        return CourseFirstYear::get();
    }

    public function CourseSecondYear()
    {
        return CourseSecondYear::get();
    }

    public function CourseThirdYear()
    {
        return CourseThirdYear::get();
    }

    public function waitingListFirstYear()
    {
        return WaitingListFirstYear::get();
    }

    public function waitingListSecondYear()
    {
        return WaitingListFirstYear::get();
    }

    public function waitingListThirdYear()
    {
        return WaitingListFirstYear::get();
    }

    public function subscribedFirstYear()
    {
        return SubscribedFirstYear::get();
    }

    public function subscribedSecondYear()
    {
        return SubscribedSecondYear::get();
    }

    public function subscribedThirdYear()
    {
        return SubscribedThirdYear::get();
    }

}
