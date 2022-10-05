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
        $mac_address = substr(exec('getmac'), 0, 17);
        if (User::where('mac_address' , '=' , $mac_address)->first() )
            return redirect()->back()->with(['mac'=>'لقد قمت بعمل ايميل من هذا الجهاز سابقا']);
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
            'mac_address' => $mac_address,
            'avatar' => $image_name,
        ]);
        DB::commit();
        return redirect()->route('student.login');
    }

    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
//        if (Auth::user()->mac_address == substr(exec('getmac'), 0, 17)) {}
//        return $this->logout();
        if (Auth::attempt($this->credentials($request))) {
            if (Auth::user()->mac_address == substr(exec('getmac'), 0, 17)) {
                $academic_year = Auth::user()->academic_year;
                if($academic_year === 1 )
                    return redirect()->route('academic_first_years');
                if($academic_year === 2 )
                    return redirect()->route('academic_second_years');
                return redirect()->route('academic_third_years');
            } else {
                //$this->logout();
                Auth::logout();
                return redirect()->back()->with(['mac' => 'يجب فتح الأيميل من الجهاز الذي قمت بتسجيل الدخول فية لأول مرة']);
            }
        }
        return redirect()->back()->withErrors([
            'errors' => 'Email Or Password Is Incorrect',
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

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('student.login');
    }

    public function handleImage($image, $folder): string
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/' . $folder), $image_name);
        return $image_name;
    }
}
