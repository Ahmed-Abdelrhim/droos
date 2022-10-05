<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPhoneNumber implements Rule
{
    private $phone;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_numeric($this->phone && strlen($this->phone) > 10 && strlen($this->phone) < 12))
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
        return 'enter a valid phone number.';
    }
}
