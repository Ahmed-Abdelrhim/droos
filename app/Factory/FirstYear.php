<?php

namespace App\Factory;

use App\Models\CourseFirstYear;

class FirstYear
{
    public function create(): CourseFirstYear
    {
        return new CourseFirstYear();
    }

}
