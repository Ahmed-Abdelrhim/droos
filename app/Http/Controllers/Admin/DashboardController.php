<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCoursesRequest;
use App\Http\Requests\LecturesRequest;
use App\Http\Traits\GlobalTrait;
use App\Models\Admin;
use App\Models\Demo;
use App\Models\Feature;
use App\Models\HomeWorkFirstYear;
use App\Models\HomeWorkSecondYear;
use App\Models\HomeWorkThirdYear;
use App\Models\LecturesFirstYear;
use App\Models\LecturesSecondYear;
use App\Models\LecturesThirdYear;
use App\Models\Message;
use App\Models\QuizFirstYear;
use App\Models\QuizSecondYear;
use App\Models\QuizThirdYear;
use App\Models\WhoAreWe;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class DashboardController extends Controller
{
    use GlobalTrait;
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

    public function updateAdminProfile(Request $request, $id): \Illuminate\Http\RedirectResponse
    {

        // Auth::guard('admin')->user()->id
        $request->validate([
            'name' => 'required|min:4|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required|min:10',
            'password' => 'nullable|min:8|string|confirmed',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:30000',
        ]);
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $password = $admin->password;
        if ($password != null)
            $password = bcrypt($request->password);
        $image_name = $admin->avatar;
        if ($request->has('avatar'))
            $image_name = uploadImage('adminImages', $request->avatar);

        DB::beginTransaction();
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $password,
            'avatar' => $image_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        return redirect()->back()->with(['success' => 'admin profile updated successfully']);
    }

    public function showAddNewLectureForm()
    {

        //return view::share('lec_name',$lec_name);
        return view('admin.lectures.add');
//        if($this->getVideoName() == null)
//            return 'yes null';
//        return $this->getVideoName();
    }

    public function getCourseMonths($id)
    {
        if ($id == 1)
            return json_encode(CourseFirstYear::get());

        if ($id == 2)
            return json_encode(CourseSecondYear::get());

        if ($id == 3)
            return json_encode(CourseThirdYear::get());

        return json_encode('not-found');
    }


    public function uploadLargeFiles(Request $request,$folder) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
         // return $fileReceived ;
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $lec_name = time() . '.'.$file->guessExtension();

            // $disk = Storage::disk(config('filesystems.default'));
            $disk = Storage::disk('public')->putFileAs($folder,$file,$lec_name);
            //$path = $disk->putFileAs('videos', $file, $fileName);

            // $lecture_path = move('lectures/'.$folder ,$lec_name );

            // delete chunked file
            unlink($file->getPathname());
            return $lec_name;
//            return [
//                'path' => asset('storage/' . $disk),
//                'filename' => $fileName
//            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];

    }



// $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
    public function addNewLecture(LecturesRequest $request)
    {
        $academic_year = $request->academic_year;
        //Lectures First Year
        if ($academic_year == 1) {
            $course = CourseFirstYear::find($request->month);
            if (!$course)
                return 'course name you have chosen not exist';

            //$video_name = uploadLecture('first', $request->lec);
            LecturesFirstYear::create([
                'name' => $request->name,
                'lec' => $request->video_name,
                'homework' => $request->homework,
                'quiz' => $request->quiz,
                'course_id' => $course->id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
            return redirect()->back()->with(['success' => 'Data Saved Successfully']);
            // return response()->json(['status' => 1 , ',msg' => 'Success Upload']);
        }

        //Lectures Second Year
        if ($academic_year == 2) {
            $course = CourseSecondYear::find($request->month);
            if (!$course)
                return 'course name you have chosen not exist';
            //$video_name = uploadLecture('second', $request->lec);
            LecturesSecondYear::create([
                'name' => $request->name,
                'lec' =>$request->video_name,
                'homework' => $request->homework,
                'quiz' => $request->quiz,
                'course_id' => $course->id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
            return redirect()->back()->with(['success' => 'Data Saved Successfully']);

            // return response()->json(['status' => 1 , ',msg' => 'Success Upload']);
        }

        //Lectures Third Year
        if ($academic_year == 3) {
            $course = CourseThirdYear::find($request->month);
            if (!$course)
                return 'course name you have chosen not exist';
            //$video_name = $this->uploadLargeFiles($request,'third');
            LecturesThirdYear::create([
                'name' => $request->name,
                'lec' => $request->video_name,
                'homework' => $request->homework,
                'quiz' => $request->quiz,
                'course_id' => $course->id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'created_at' => now(),
                'updated_at' => now(),]);
            return redirect()->back()->with(['success' => 'Data Saved Successfully']);
            //return response()->json(['status' => 1 , ',msg' => 'Success Upload']);
        }
        return response()->json(['status' => 0 , ',msg' => 'Failed Upload']);

        // return redirect()->route('add.new.lec')->with(['success' => 'Lecture Uploaded Successfully']);

    }


    public function viewMessages()
    {
        $messages = Message::paginate(10);
        return view('admin.messages', compact('messages'));
    }

    public function replyMsgForm($id)
    {
        $msg = Message::find($id);
        if(!$msg)
            return 'This Message has been Deleted';

        return view('admin.reply-msg',compact('msg'));
    }

    public function adminReplyMsg(Request $request , $id)
    {
        // return $request->admin_reply;
        $msg= Message::find($id);
        if(!$msg)
            return 'This Message has been Deleted';
        // return $request->admin_reply;
        $msg->admin_reply = $request->admin_reply;
        $msg->save();
        return redirect()->back()->with(['success' => 'Message Sent To Student Successfully']);

    }

    public function deleteMessage($id)
    {
        $msg = Message::find($id);
        if (!$msg)
            return 'Message Not Found';
        $msg->delete();
        return redirect()->back()->with(['success' => 'Message Deleted Successfully']);
    }

    public function features()
    {
        $features = Feature::get();
        if(Auth::check()) {
            $user = Auth::user();
            $user->mac_address = 1;
            $user->save();
        }
        return view('student.features', compact('features'));
    }

    public function addNewFeatureForm()
    {
        $features = Feature::get();
        return view('admin.feature', compact('features'));
    }

    public function storeNewFeature(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['feature' => 'string|min:50']);
        DB::beginTransaction();
        if (Feature::count() > 0) {
            $feature = Feature::first();
            $feature->update([
                'text' => $request->feature,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Website Features updated successfully']);
        }
        Feature::create([
            'text' => $request->feature,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        return redirect()->back()->with(['success' => 'Website Features updated successfully']);
    }

    public function whoAreWeForm()
    {
        $text = WhoAreWe::get();
        return view('admin.who_are_we', compact('text'));
    }

    public function updateWhoAreWe(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['text' => 'string|min:50']);
        DB::beginTransaction();
        if (WhoAreWe::count() > 0) {
            $who_are_we = WhoAreWe::first();
            $who_are_we->update([
                'text' => $request->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Who are we updated successfully']);
        }
        WhoAreWe::create([
            'text' => $request->text,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::commit();
        return redirect()->back()->with(['success' => 'Who are we created successfully']);
    }

    public function demoVideosForm()
    {
        return view('admin.demo');
    }

    public function addDemoVideo(Request $request)
    {
        $request->validate([
            'demo' => 'mimetypes:video/mp4,video/mpeg,video/quicktime',
            'academic_year' => 'between:1,3',
        ]);
        if ($request->academic_year == 1) {
            $demo = uploadLecture('demo_first_year', $request->demo);
            $demo_video = Demo::where('academic_year', '=', 1)->first();
            if ($demo_video)
                $demo_video->delete();
            Demo::create([
                'demo' => $demo,
                'academic_year' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'demo video first year added successfully']);
        }

        if ($request->academic_year == 2) {
            $demo = uploadLecture('demo_second_year', $request->demo);
            $demo_video = Demo::where('academic_year', '=', 2)->first();
            if ($demo_video)
                $demo_video->delete();
            Demo::create([
                'demo' => $demo,
                'academic_year' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'demo video second year added successfully']);
        }

        if ($request->academic_year == 3) {
            $demo = uploadLecture('demo_third_year', $request->demo);
            $demo_video = Demo::where('academic_year', '=', 3)->first();
            if ($demo_video)
                $demo_video->delete();
            Demo::create([
                'demo' => $demo,
                'academic_year' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'demo video third year added successfully']);
        }

        return '';

    }


    public function homeWorkForm()
    {
        return view('admin.homework.add');
    }

    public function storeHomework(Request $request)
    {
        $request->validate([
            'link' => 'required|string',
            'academic_year' => 'required|between:1,3',
            'course_id' => 'required|numeric',
            'week' => 'required|between:1,4',
        ]);
        if ($request->academic_year == 1) {
            $course = CourseFirstYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            HomeWorkFirstYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'Home work first year added successfully']);
        }

        if ($request->academic_year == 2) {
            $course = CourseSecondYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            HomeWorkSecondYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'Home work second year added successfully']);
        }

        if ($request->academic_year == 3) {
            $course = CourseThirdYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            HomeWorkThirdYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'Home work third year added successfully']);
        }
    }

    public function quizForm()
    {
        return view('admin.quiz.add');
    }


    public function storeQuiz(Request $request)
    {
        $request->validate([
            'link' => 'required|string',
            'academic_year' => 'required|between:1,3',
            'course_id' => 'required|numeric',
            'week' => 'required|between:1,4',
        ]);
        if ($request->academic_year == 1) {
            $course = CourseFirstYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            QuizFirstYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'quiz first year added successfully']);
        }

        if ($request->academic_year == 2) {
            $course = CourseSecondYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            QuizSecondYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'quiz second year added successfully']);
        }

        if ($request->academic_year == 3) {
            $course = CourseThirdYear::find($request->course_id);
            if (!$course)
                return 'Course You Have Selected Not Found';
            QuizThirdYear::create([
                'course_id' => $request->course_id,
                'serial_number' => $course->serial_number,
                'week' => $request->week,
                'link' => $request->link,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with(['success' => 'quiz third year added successfully']);
        }
    }

}




