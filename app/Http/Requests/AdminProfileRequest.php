<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $admin = auth()->guard('admin')->user();
        return [
            'name' => 'required|min:4|string',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone_number' => 'required|min:10',
            'password' => 'nullable|min:8|string',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:30000',
        ];
    }
}
