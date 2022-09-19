<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class StudentGeneralController extends Controller
{
    public function storeMessage(Request $request)
    {
        $request->validate([
            'msg' => 'required | min:4'
        ]);
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $phone_number = Auth::user()->phone_number;
        try {
            DB::beginTransaction();
            Message::create([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phone_number,
                'msg' => $request->input('msg'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->back()->with(['success'=>'تم ارسال الرسالة الي مستر علاء الدين']);
        } catch (Exception $e)
        {
            return redirect()->back()->withErrors(['errors'=> 'حدث خطأ أثناء ارسال الرسالة']);
        }

    }

    public function play()
    {
        return Auth::user()->name;
    }
}
