<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'group_id' => 'required',
            'address' => 'required',
            'image' => 'required',

            'password' => 'required|min:6',
            'newpassword' => 'required|min:6',
            'renewpassword' => 'required|min:6',

        ];
    }
    public function messages()
    {
        return [

            'password.required' => ':attribute bắt buộc nhập',
            'password.min' => ':attribute bắt buộc :min kí tự trở lên',

            //đổi mật khẩu
            'newpassword.required' => ':attribute bắt buộc nhập',
            'email.required' => ':attribute bắt buộc nhập',
            'phone.required' => 'số điện thoại bắt buộc nhập',
            'name.required' => ':attribute bắt buộc nhập',
            'birthday.required' => 'ngày sinh bắt buộc nhập',
            'gender.required' => 'giới tính bắt buộc nhập',
            'group_id.required' => 'chức vụ bắt buộc nhập',
            'address.required' => 'địa chỉ bắt buộc nhập',
            'image.required' => ':attribute bắt buộc nhập',

            'newpassword.min' => ':attribute bắt buộc :min kí tự trở lên',
            'renewpassword.required' => ':attribute bắt buộc nhập',
            'renewpassword.min' => ':attribute bắt buộc :min kí tự trở lên',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'newpassword' => 'Mật khẩu mới',
            'renewpassword' => 'Mật khẩu xác nhận',
        ];
    }
}
