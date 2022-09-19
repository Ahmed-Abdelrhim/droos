<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
