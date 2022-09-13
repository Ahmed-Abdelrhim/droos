<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | min:4 | string ',
            'email' => 'required | unique:users,email',
            'phone_number' => 'required|  min:10 | unique:users',
            'parent_number' => 'required | min:10 | unique:users',
            'academic_year' => 'between:1,3',
//            'avatar' => 'nullable | string',
            'password' => 'required|confirmed|min:6',
            '' => '',
        ];
    }
}
