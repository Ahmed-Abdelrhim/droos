<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    public function showRegisterForm()
    {
        return view('student.auth.register');
    }

    public function showLoginForm()
    {
        return view('student.auth.login');
    }
}
