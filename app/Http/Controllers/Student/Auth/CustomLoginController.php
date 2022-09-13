<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showRegisterForm()
    {
        return view('student.auth.register');
    }

    public function registerStudent(StudentLoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $image_name = null;
        if ($request->has('avatar'))
            $image_name = $this->handleImage($request->avatar, 'studentImages');
        DB::beginTransaction();
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'parent_number' => $request->input('parent_number'),
            'academic_year' => $request->input('academic_year'),
            'password' => bcrypt($request->input('password')),
            'avatar' => $image_name,
        ]);
        DB::commit();
        return redirect()->route('student.login');
    }

    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($this->credentials($request))) {
            $academic_year = Auth::user()->academic_year;
            if($academic_year === 1 )
                return redirect()->route('academic_first_years');
            if($academic_year === 2 )
                return redirect()->route('academic_second_years');
            return redirect()->route('academic_third_years');
        }
        return back()->withErrors([
            'email' => 'Email Or Password Is Incorrect',
        ]);
    }

    public function credentials($request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username(): string
    {
        return 'email';
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login');
    }

    public function handleImage($image, $folder)
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/' . $folder), $image_name);
        return $image_name;
    }
}
