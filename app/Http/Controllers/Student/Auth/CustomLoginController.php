<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cheats;


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
        User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'parent_number' => null,
            'academic_year' => $request->input('academic_year'),
            'password' => bcrypt($request->input('password')),
            'mac_address' => 0,
            'avatar' => $image_name,
        ]);
        DB::commit();
        return redirect()->route('login');
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
            //return $this->authenticated();
             //Don't Open Two Devices At The Same Time
            $logged_in = Auth::user()->mac_address;
            if ($logged_in != 0) {
                $user = Auth::user();
                $cheated_before = Cheats::query()->where('student_id', '=', $user->id)->first();
                if ($cheated_before) {
                    $cheats = $cheated_before->cheats_number;
                    //warning student
                    if ($cheats == 0) {
                        $cheated_before->cheats_number = 1;
                        $cheated_before->save();
                        $user->mac_address = 0;
                        $user->save();
                        Auth::logout();
                        return redirect()->back()->with(['mac' => '?????????? ??????: ?????? ?????????? ?????? ?????????????? ?????? ???????? ???? ???????? ?????????? ???????? ?????? ??????????????']);
                    }
                    //deleting student account
                    if ($cheats == 1) {
                        $user->delete();
                        Auth::logout();
                        return redirect()->back()->with(['mac' => '???? ?????? ?????????????? ???????? ?????????? ???????? ???????? ???? ?????? ?????? ???????? ???? ????????']);
                    }
                }
                DB::beginTransaction();
                Cheats::create(['student_id' => $user->id, 'cheats_number' => 0]);
                DB::commit();
                $user->mac_address = 0;
                $user->save();
                Auth::logout();
                $request->session()->flash('mac', '?????????? ??????: ?????? ?????????????? ?????????? ???????????? ???????????? ?????? ?????? ?????????????? ?????? ?????? ???????? ???????? ???????? ?????? ?????????????? ');
                //return redirect()->route('login')->with(['mac' => ' ?????????? ??????: ?????? ?????????????? ?????????? ???????????? ???????????? ?????? ?????? ?????????????? ?????? ?????? ???????? ???????? ???????? ?????? ??????????????  ']);
                return redirect()->back();
            }
            else {
                $user = Auth::user();
                //$user->mac_address = 1;
                //$user->save();
                $academic_year = Auth::user()->academic_year;
                if ($academic_year === 1)
                    return redirect()->route('academic_first_years');
                if ($academic_year === 2)
                    return redirect()->route('academic_second_years');
                return redirect()->route('academic_third_years');
            }
        }
        return redirect()->back()->withErrors([
            'errors' => 'Email Or Password Is Incorrect',
        ]);
    }

//    protected function authenticated(): \Illuminate\Http\RedirectResponse
//    {
//        Auth::logoutOtherDevices(request('password'));
//        return redirect()->intended();
//    }

    public function credentials($request)
    {
        return $request->only($this->username($request), 'password');
    }

    public function username($request): string
    {
        $value = $request->get('email');
        $login = 'email';
        if (is_numeric($value))
            $login = 'phone_number';
        if (filter_var($value , FILTER_VALIDATE_EMAIL))
            $login = 'email';
        request()->merge([$login => $value]);
        return $login;
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $user->mac_address = 0;
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    }

    public function handleImage($image, $folder): string
    {
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images/' . $folder, $image_name);
        return $image_name;
    }
}


//            if (Auth::user()->mac_address === request()->getClientIp()) {
//            } else {
//                //$this->logout();
//                Auth::logout();
//                return redirect()->back()->with(['mac' => '?????? ?????? ?????????????? ???? ???????????? ???????? ?????? ???????????? ???????????? ?????? ???????? ??????']);
//            }


//        $mac_address = substr(exec('getmac'), 0, 17);
//        $ip = request()->getClientIp();
//        if($ip == null)
//            $ip = request()->ip();
//        if (User::where('mac_address' , '=' , $mac_address)->first() )
//            return redirect()->back()->with(['mac'=>'?????? ?????? ???????? ?????????? ???? ?????? ???????????? ??????????']);
