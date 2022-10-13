<?php

namespace App\Http\Controllers;

use App\Models\CourseThirdYear;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileUploadController extends Controller {

    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view('chunck-upload');
    }

    public function uploadLargeFiles(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $lec_name = time(). '.'.$file->guessExtension();
            // $disk = Storage::disk(config('filesystems.default'));
            $disk = Storage::disk('public')->putFileAs('third',$file,$lec_name);
            //$path = $disk->putFileAs('videos', $file, $fileName);

//            $lec_name = time() . '.'.$file->getClientOriginalName();
//            $lecture_path = move('lectures/'.$folder ,$lec_name );

            // delete chunked file
            unlink($file->getPathname());
//            $add = CourseThirdYear::create([
//                'name' => $request->name,
//                'lec' => $lec_name,
//                'homework' => $request->homework,
//                'quiz' => $request->quiz,
//                'course_id' => 1,
//                'serial_number' => 1,
//                'week' => $request->week,
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//            if($add)
//            {
                return [
                    'path' => asset('storage/' . $disk),
                    'filename' => $fileName
                ];
//            }
            // return response()->json(['msg' => 'file success']);

        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];



    }
}
