<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatKhauRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'old_pass'=>'required|min:8',
            'new_pass'=>'required|min:8',
            'confirm_pass'=>'required|same:new_pass'
        ];
    }

    public function messages()
    {
        return [
            'old_pass.required'=>'Mật khẩu hiện tại không được bỏ trống',
            'old_pass.min'=>'Mật khẩu hiện tại tối thiểu 8 ký tự',
            'new_pass.required'=>'Mật khẩu mởi không được bỏ trống',
            'new_pass.min'=>'Mật khẩu mới tối thiểu 8 ký tự',
            'confirm_pass.required'=>'Xác nhận mật khẩu không được bỏ trống',
            'confirm_pass.same'=>'Xác nhận mật khẩu phải trùng với mật khẩu mới',
        ];
    }
}
