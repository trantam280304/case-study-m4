<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'slug' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'image' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'name.unique' => 'Tên đã tồn tại',
            'slug.required' => 'Slug bắt buộc nhập',
            'price.required' => 'Giá bắt buộc nhập',
            'description.required' => 'Mô tả bắt buộc nhập',
            'quantity.required' => 'Số lượng bắt buộc nhập',
            'status.required' => 'Trạng thái bắt buộc nhập',
            'image.required' => 'Ảnh bắt buộc nhập',
        ];
    }
}
