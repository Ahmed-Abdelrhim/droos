<?php

function uploadImage($folder, $image): string
{
    $image_name = time() . '.' . $image->extension();
    $image->move('images/' . $folder, $image_name);
    return $image_name;
}

function uploadLecture($folder, $video): string
{
    $video_name = time() . '.' . $video->extension();
    $video->move('lectures/' . $folder, $video_name);
    return $video_name;
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

?>