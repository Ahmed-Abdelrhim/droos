<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCoursesRequest;
use App\Http\Requests\LecturesRequest;
use App\Models\LecturesFirstYear;
use App\Models\LecturesSecondYear;
use App\Models\LecturesThirdYear;
use App\Models\Message;
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
use Illuminate\Support\Facades\Validator;

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
        return User::where('academic_year', 1)->get();
    }

    public function showCoursesAddForm()
    {
        return view('admin.courses.add');
    }

    public function addCourses(AddCoursesRequest $request)
    {
        $academic_year = $request->academic_year;
        if (in_array($academic_year, [1, 2, 3])) {
            $discount = null;
            $oldPrice = $request->price;
            $price = $request->price;
            if ($request->discount != null) {
                $dis = ($request->discount / 100) * ($request->price);
                $discount = $request->discount;
                $price = $request->price - $dis;
            }
            if ($academic_year == 1) {
                $cover = handleImage('courses_first_year', $request);
                CourseFirstYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($academic_year == 2) {
                $cover = handleImage('courses_second_year', $request);
                CourseSecondYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($academic_year == 3) {
                $cover = handleImage('courses_third_year', $request);
                CourseThirdYear::create([
                    'name' => $request->name,
                    'serial_number' => $request->serial_number,
                    'price' => $price,
                    'cover' => $cover,
                    'discount' => $discount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return redirect()->back()->with(['success' => 'تم اضافة الكورس بنجاح']);
        }
        return 'يجب ادخال السنة الدراسية صحيحا وأن تكون أولي أو ثانيةأو ثالثة ثانوي';
    }

    public function studentsSecondYear()
    {
        return User::where('academic_year', 2)->get();
    }

    public function studentsThirdYear()
    {
        return User::where('academic_year', 3)->get();
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
        $allData = SubscribedFirstYear::with('students')->paginate(10);
        return view('admin.subscribed.1st', compact('allData'));
    }

    public function subscribedSecondYear()
    {
        $allData = SubscribedSecondYear::with('students')->paginate(10);
        return view('admin.subscribed.2nd', compact('allData'));

    }

    public function subscribedThirdYear()
    {
        $allData = SubscribedThirdYear::with('students')->paginate(10);
        return view('admin.subscribed.3rd', compact('allData'));
    }


    public function showTeacherProfile()
    {
        return view('admin.teacher_profile');
    }

    public function showAddNewLectureForm()
    {
        return view('admin.lectures.add');
    }

    public function addNewLecture(LecturesRequest $request): \Illuminate\Http\RedirectResponse
    {
        $academic_year = $request->academic_year;

        //Lectures First Year
        if ($academic_year == 1) {
            $video_name = uploadLecture('first',$request->lec);
            LecturesFirstYear::create([
                'name' => $request->name,
                'lec' => $video_name,
                'serial_number' => $request->month,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
        }

        //Lectures Second Year
        if ($academic_year == 2) {
            $video_name = uploadLecture('second',$request->lec);
            LecturesSecondYear::create([
                'name' => $request->name,
                'lec' => $video_name,
                'serial_number' => $request->month,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
        }

        //Lectures Third Year
        if ($academic_year == 3) {
            $video_name = uploadLecture('third',$request->lec);
            LecturesThirdYear::create([
                'name' => $request->name,
                'lec' => $video_name,
                'serial_number' => $request->month,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
        }
        return redirect()->route('add.new.lec')->with(['success' => 'Lecture Uploaded Successfully']);

    }

    public function viewMessages()
    {
        $messages = Message::paginate(10);
        return view('admin.messages',compact('messages'));
    }

    public function deleteMessage($id)
    {
        $msg = Message::find($id);
        if(!$msg)
            return 'Message Not Found';
        $msg->delete();
        return redirect()->back()->with(['success' => 'Message Deleted Successfully']);
    }

    public function features()
    {
        return view('student.features');
    }


}
