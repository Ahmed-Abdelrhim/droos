<?php

namespace App\Http\Controllers;

use App\Models\LecturesThirdYear;
use App\Models\User;
use App\Models\WhoAreWe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class StudentGeneralController extends Controller
{
    public function storeMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'msg' => 'required | min:4'
        ]);
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $phone_number = Auth::user()->phone_number;
//        try {
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
        return redirect()->back()->with(['success' => 'تم ارسال الرسالة الي مستر علاء الدين']);
//        }
//        catch (Exception $e) {
//            return redirect()->back()->with(['errors' => 'حدث خطأ أثناء ارسال الرسالة']);
//        }

    }

    public function play(): array
    {
        $nums = [1, 2, 3, 4];
        $result = [];
        $result[0] = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            //Time Complexity is O(n)
            $result[$i] = $nums[$i] + $result[$i - 1];
        }
        return $result;
    }

    public function viewProfileForm()
    {
        return view('student.profile');
    }

    public function updateStudentProfile(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6|confirmed',
            'phone_number' => 'required|min:10|unique:users,phone_number,' . Auth::id(),
            'parent_number' => 'nullable',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $student = Auth::user();
        $image_name = $student->avatar;
        if ($request->has('avatar')) {
            // $image_name = uploadImage('studentImages', $request->avatar);
            //TODO: MAKE it in the background
            $student->addMediaFromRequest('avatar')->toMediaCollection('students');
        }

        $password = Auth::user()->password;
        if ($request->password != null) {
            $password = bcrypt($request->password);
        }

        DB::beginTransaction();
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'parent_number' => $request->parent_number,
            'avatar' => $image_name,
            'password' => $password,
            'mac_address ' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        $notifications = array('message' => 'تم تحديث الأيميل بنجاح', 'alert-type' => 'success');
        return redirect()->back()->with($notifications);
    }

    public function deleteStudent($id)
    {
        $student = User::find($id);
        if (!$student)
            return 'Student Not Found';
        //$file_path = 'images/studentImages/'.$student->avatar;
        //$image_name = public_path().'/images/studentImages/'.$student->avatar;
        // if($student->avatar != null)
        //    unlink($image_name);
        $student->delete();
        return redirect()->back()->with(['success' => 'Student deleted successfully']);
    }

    public function aboutUs()
    {
        $who_are_we = WhoAreWe::get();
        if (Auth::check()) {
            $user = Auth::user();
            $user->mac_address = 1;
            $user->save();
        }
        return view('student.about', compact('who_are_we'));
    }

    public function contactUs()
    {
        if(Auth::check() ) {
            $user = Auth::user();
            $user->mac_address = 1;
            $user->save();
        }
        return view('student.contact');
    }

    public function showStudentsOpinion()
    {
        return view('student.opinion');
    }

    public function inbox()
    {
        if(Auth::check()) {
            $student = Auth::user();
            if(!$student)
                return view('student.access_denied');
            $student->mac_address = 1;
            $student->save();
            $email = $student->email;
            $messages = Message::where('email','=',$email)->get();
            if(count($messages) > 0)
                return view('student.inbox',compact('messages'));
            return view('student.inbox');
        }
    }

    public function createLectureSource($id)
    {
        $lec = LecturesThirdYear::find($id);
        $name = $lec->lec;
        $fileContents = Storage::disk('public')->get("third/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

}
