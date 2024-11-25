<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
        $rules = [
            'product_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:200',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,category_id'
        ];

        if ($this->isMethod('put')) {
            $rules = [
                'product_name' => 'sometimes|string|max:100',
                'description' => 'nullable|string|max:200',
                'price' => 'sometimes|integer|min:0',
                'quantity' => 'sometimes|integer|min:0',
                'unit' => 'sometimes|string|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'sometimes|exists:categories,category_id'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'unit.required' => 'Vui lòng nhập đơn vị tính của sản phẩm.',
            'image.required' => 'Vui lòng chọn hình ảnh sản phẩm.',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm.',
            'category_id.exists' => 'Danh mục không tồn tại.'
        ];
    }

    /*
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
        */
}
