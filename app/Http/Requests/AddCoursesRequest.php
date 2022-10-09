<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCoursesRequest extends FormRequest
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
            'name' => 'required | min:4 ',
            'academic_year' => 'required | between:1,3',
            'serial_number' => 'required ',
            'price' => 'required',
            'discount' => 'nullable ',
            'cover' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function messages()
    {
        return [
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
        ];
    }
}
