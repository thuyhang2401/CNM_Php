<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerPasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string|min:8|max:16',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&^#]/',
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu.',
            'current_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'current_password.max' => 'Mật khẩu không được dài quá 16 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.max' => 'Mật khẩu không được dài quá 16 ký tự.',
            'password.regex' => 'Mật khẩu chưa đúng định dạng',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu mới.',
            'password_confirmation.same' => 'Mật khẩu không khớp.',
        ];
    }
}
