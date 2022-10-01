<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // use guarded;
    // View Admin Login Form Function
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Checks If Admin In Exists In Database Function
    public function login(Request $request)
    {
        // return $request;
        if (Auth::guard('admin')->attempt($this->credentials($request))) {
            return redirect()->route('dashboard');
            // return 'Admin';
        }
//        $request->session()->flash('message', 'email or password is incorrect' );
//        return back()->withErrors([
//            'message ' => 'email or password is incorrect',
//            'email' => 'email or password is incorrect.',
//            'password' => 'wrong password'
//        ]);
        return back()->with(['message'=> 'Email or password is wrong!']);

    }

//    public function login(Request $request)
//    {
////        return $request;
//        if (Auth::guard('author')->attempt($this->credentials($request))) {
//            return 'true';
//            return redirect()->route('teachers');
//        }
//        // $request->session()->flash('message', 'email or password is incorrect' );
//        return 'false';
//        return back()->withErrors([
//            'message ' => 'email or password is incorrect',
//        ]);
//    }

    public function credentials($request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username(): string
    {
        return 'email';
    }

    //Admin Logout Function
    public function logout()
    {
        // Using logout trait
//        $adminLogout = auth()->guard('author');
        Auth::guard('admin')->logout();
//        $adminLogout->logout();

        return redirect()->route('admin.login.form');
    }
}
