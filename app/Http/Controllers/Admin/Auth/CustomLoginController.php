<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        if (Auth::guard('admin')->attempt($this->credentials($request))) {
            return 'Admin';
        }
        return redirect()->back()->withErrors(['errors' => 'Email Or Password Is Incorrect',]);
    }

    public function credentials($request)
    {
        return $request->only($this->username($request), 'password');
    }

    public function username($request): string
    {
        $value = $request->get('email');
        $login = 'email';
        if (is_numeric($value))
            $login = 'phone';
        if (filter_var($value,FILTER_VALIDATE_EMAIL))
            $login = 'email';
        request()->merge([$login => $value]);
        return $login;
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form');

    }
}
