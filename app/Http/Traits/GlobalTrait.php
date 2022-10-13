<?php

namespace App\Http\Traits;


trait GlobalTrait {
     public $video_name = 'VIDEO';
//    public function __construct($video_name)
//    {
//        $this->video_name = $video_name;
//    }

    public function getAllSettings($video_name)
    {
        // Fetch all the settings from the 'settings' table.
        // return $this->video_name;
        $this->video_name = $video_name;
        return $this->video_name;
    }

    public function getVideoName()
    {
        return $this->video_name;
    }
}
