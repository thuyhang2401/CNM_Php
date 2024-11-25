<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffProfileRequest extends FormRequest
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
            'fullname' => 'sometimes|string|max:100',
            'gender' => 'sometimes|string|max:20',
            'dob' => 'sometimes|date',
            'phone_number' => 'sometimes|string|max:20',
            'address' => 'sometimes|string|max:100',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'dob.required' => 'Vui lòng chọn ngày sinh.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'avatar.required' => 'Vui lòng chọn hình ảnh.',
            'avatar.max' => 'Hình ảnh không vượt quá 5MB.',
            'avatar.image' => 'Hình ảnh không hợp lệ.'
        ];
    }
}
