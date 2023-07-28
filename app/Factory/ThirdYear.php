<?php
namespace App\Factory;
use App\Models\CourseThirdYear;

class ThirdYear
{
    public function create(): CourseThirdYear
    {
        return new CourseThirdYear();
    }

}
