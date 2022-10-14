<?php

namespace App\Http\Controllers;

use App\Http\Requests\LecturesRequest;
use App\Http\Traits\GlobalTrait;
use App\Models\CourseFirstYear;
use App\Models\CourseSecondYear;
use App\Models\CourseThirdYear;
use App\Models\LecturesFirstYear;
use App\Models\LecturesSecondYear;
use App\Models\LecturesThirdYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;

//use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\View;


class FileUploadController extends Controller
{
    use GlobalTrait;

    public $videos_name;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('chunck-upload');
    }

    //name+ academic_year+month +week +homework +quiz


    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $lec_name = time() . '.' . $file->guessExtension();
            // $disk = Storage::disk(config('filesystems.default'));
            $disk = Storage::disk('public')->putFileAs('lectures', $file, $lec_name);
            //$disk = $file->move('lectures/third',$lec_name);
            //$path = $disk->putFileAs('videos', $file, $fileName);

//            $lec_name = time() . '.'.$file->getClientOriginalName();
//            $lecture_path = move('lectures/'.$folder ,$lec_name );

            // delete chunked file
            unlink($file->getPathname());
//            if($receiver->isUploaded())
//            {
//                $add = CourseThirdYear::create([
//                    'name' => 'Ahmed Abdelrhim',
//                    'lec' => $lec_name,
//                    'homework' => null,
//                    'quiz' => null,
//                    'course_id' => 1,
//                    'serial_number' => 1,
//                    'week' => 1,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);
//            }

            //view::share('lec_name' ,$lec_name);
            $nnn = $this->getAllSettings($lec_name);
            $this->videos_name = $lec_name;
            return [
                'path' => asset('storage/' . $disk),
                'filename' => $lec_name
            ];

        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function addNewLecture(LecturesRequest $request)
    {
        $this->getAllSettings('AHMED');
        if ($this->getVideoName() == null)
            return 'Yes Null Try Again!';
        return $this->getVideoName();
        $academic_year = $request->academic_year;
        //Lectures First Year
        if ($academic_year == 1) {
            $course = CourseFirstYear::find($request->month);
            if (!$course)
                return 'course name you have chosen not exist';

            //$video_name = uploadLecture('first', $request->lec);
            LecturesFirstYear::create([
                'name' => $request->name,
                'lec' => \Illuminate\Support\Facades\View::share('lec_name'),
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
                'lec' => \Illuminate\Support\Facades\View::share('lec_name'),
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
                'lec' => view::share('lec_name'),
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
        return response()->json(['status' => 0, ',msg' => 'Failed Upload']);

        // return redirect()->route('add.new.lec')->with(['success' => 'Lecture Uploaded Successfully']);

    }


    public function add(Request $request)
    {
        //return $request;
        $add = CourseThirdYear::create([
            'name' => 'Ahmed Abdelrhim',
            'lec' => '',
            'homework' => null,
            'quiz' => null,
            'course_id' => 1,
            'serial_number' => 1,
            'week' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return '';
    }
}
