<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LectureUploading implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    //            if(in_array($this->month,[1,2,3,4,5,6,7,8,9,10,11,12]))
//                return true;
    public function passes($attribute, $value)
    {
        if (is_numeric($this->month))
            return true;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
