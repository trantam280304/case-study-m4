<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'delete_at' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'delete_at.required'=>'Nhập ngày vào',
        ];
    }
}
