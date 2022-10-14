<?php

use Illuminate\Support\Facades\Storage;
function uploadImage($folder, $image): string
{
    $image_name = time() . '.' . $image->extension();
    //$image->move('images/' . $folder, $image_name);
    Storage::disk('public')->putFileAs( $folder, $image, $image_name);

    return $image_name;
}

function uploadLecture($folder, $video): string
{
    $video_name = time() . '.' . $video->extension();
    //$video->move('lectures/' . $folder, $video_name);
    Storage::disk('public')->putFileAs( 'images/'.$folder, $video, $video_name);
    //Storage::disk('public')->putFile('lectures/' . $folder, $video_name,$video);
    return $video_name;
    // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));

}

function handleImage($folder, $request): ?string
{
    if ($request->has('cover'))
        return uploadImage($folder, $request->cover);
    return $image_name = null;
}

function handleUpdateImage($folder, $request, $model): string
{
    if ($request->has('image'))
        return $image_name = uploadImage($folder, $request->image);
    return $image_name = $model->photo;
}

//function ChunkVideo()
//{
//    // Make sure file is not cached (as it happens for example on iOS devices)
//    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//    header("Cache-Control: no-store, no-cache, must-revalidate");
//    header("Cache-Control: post-check=0, pre-check=0", false);
//    header("Pragma: no-cache");
//
//// Settings
//    $targetDir = public_path('lectures/third');
//    $cleanupTargetDir = true; // Remove old files
//    $maxFileAge = 5 * 3600; // Temp file age in seconds
//
//
//// Create target dir
//    if (!file_exists($targetDir)) {
//        @mkdir($targetDir);
//    }
//
//// Get a file name
//    if (isset($_REQUEST["name"])) {
//        $fileName = $_REQUEST["name"];
//    } elseif (!empty($_FILES)) {
//        $fileName = $_FILES["file"]["name"];
//    } else {
//        $fileName = uniqid("file_");
//    }
//
//    $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
//
//// Chunking might be enabled
//    $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
//    $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
//
//
//// Remove old temp files
//    if ($cleanupTargetDir) {
//        if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
//            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
//        }
//
//        while (($file = readdir($dir)) !== false) {
//            $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
//
//            // If temp file is current file proceed to the next
//            if ($tmpfilePath == "{$filePath}.part") {
//                continue;
//            }
//
//            // Remove temp file if it is older than the max age and is not the current file
//            if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
//                @unlink($tmpfilePath);
//            }
//        }
//        closedir($dir);
//    }
//
//
//// Open temp file
//    if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
//        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
//    }
//
//    if (!empty($_FILES)) {
//        if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
//            die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
//        }
//
//        // Read binary input stream and append it to temp file
//        if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
//            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//        }
//    } else {
//        if (!$in = @fopen("php://input", "rb")) {
//            die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//        }
//    }
//
//    while ($buff = fread($in, 4096)) {
//        fwrite($out, $buff);
//    }
//
//    @fclose($out);
//    @fclose($in);
//
//// Check if file has been uploaded
//    if (!$chunks || $chunk == $chunks - 1) {
//        // Strip the temp .part suffix off
//        rename("{$filePath}.part", $filePath);
//    }
//
//// Return Success JSON-RPC response
//    //die('{"jsonrpc" : "2.0", "result" : {"status": 200, "message": "The file has been uploaded successfully!"}}');
//    return response()->json(["status"=> 200, "message"=> "The file has been uploaded successfully!"]);
//}

?>
