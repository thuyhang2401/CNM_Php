<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerProfileRequest extends FormRequest
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
            'fullname' => 'required|string|max:100',
            'gender' => 'required|max:10',
            'dob' => 'required|date',
            'phone_number' => 'nullable|max:11',
            'address' => 'nullable|max:100',
            'avatar' => 'nullable|file|mimes:jpeg,png|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên.',
            'fullname.max' => 'Họ tên không được vượt quá 100 ký tự.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.max' => 'Giới tính không hợp lệ.',
            'dob.required' => 'Vui lòng chọn ngày sinh.',
            'dob.date' => 'Ngày sinh không hợp lệ.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 11 ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 100 ký tự.',
            'avatar.file' => 'Tệp tải lên phải là một tệp hợp lệ.',
            'avatar.mimes' => 'Ảnh đại diện phải là tệp có định dạng: jpeg, png.',
            'avatar.max' => 'Ảnh đại diện không được vượt quá 5MB.',
        ];
    }
}
