<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:accounts,username',
            'email' => 'required|string|max:255|unique:accounts,email',
            'gender' => 'required|string',
            'password' => 'required|string|min:8|max:255|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'username.unique' => 'Đã tồn tại username này',
            'email.unique' => 'Email này đã được sử dụng',
            'gender.required' => 'Vui lòng chọn giới tính của bạn',
            'password.confirmed' => 'Mật khẩu không khớp'
        ];
    }
}
