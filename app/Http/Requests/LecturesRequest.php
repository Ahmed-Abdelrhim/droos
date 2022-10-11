<?php

namespace App\Http\Requests;

use App\Rules\LectureUploading;
use Illuminate\Foundation\Http\FormRequest;

class LecturesRequest extends FormRequest
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
//            'lec' => 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime'
        // ,video/mpeg,video/quicktime
            'lec' => 'mimetypes:video/mp4',
            'name' => 'string|min:4|max:250',
            'academic_year' => 'between:1,3',
            'month' => [new LectureUploading($this->month)],
            'week' => 'between:1,4',
            'homework' => 'nullable|string',
            'quiz' => 'nullable|string',
        ];
    }
}
