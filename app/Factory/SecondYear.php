<?php

namespace App\Factory;

use App\Models\CourseSecondYear;

class SecondYear
{
    public function create(): CourseSecondYear
    {
        return new CourseSecondYear();

    }
}
