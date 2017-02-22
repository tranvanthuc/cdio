<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|alpha_num|exists:users,username',
            'password' => 'required|alpha_num'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản !',
            'username.alpha_num' => 'Tên tài khoản chỉ chứa ký tự chữ và số !',
            'username.exists' => 'Tên tài khoản không tồn tại !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.alpha_num' => 'Mật khẩu chỉ chứa ký tự chữ và số !'
        ];
    }
}
