<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users,username|alpha_num',
            'password' => 'required|alpha_num',
            'confirmPassword' => 'required|alpha_num|same:password',
            'name' => 'required|alpha',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản !',
            'username.alpha_num' => 'Tên tài khoản chỉ chứa ký tự chữ và số !',
            'username.unique' => 'Tên tài khoản đã tồn tại !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'confirmPassword.required' => 'Vui lòng nhập mật khẩu xác nhận !',
            'confirmPassword.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !',
            'confirmPassword.same' => 'Mật khẩu và mật khẩu xác nhận không trùng khớp !',
            'name.required' => 'Vui lòng nhập họ và tên !',
            'name.alpha' => 'Họ và tên chỉ dùng ký tự chữ!',
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'Email sai cấu trúc, vui lòng nhập lại !'
        ];
    }
}
