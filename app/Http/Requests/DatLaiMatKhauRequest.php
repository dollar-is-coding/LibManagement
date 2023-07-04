<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatLaiMatKhauRequest extends FormRequest
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
            'new_pass' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])/',
            'confirm_pass' => 'required|same:new_pass',
        ];
    }

    public function messages()
    {
        return [
            'new_pass.required' => 'Mật khẩu mới không được bỏ trống',
            'new_pass.min' => 'Mật khẩu mới tối thiểu 8 ký tự',
            'new_pass.regex' => 'Mật khẩu mới phải chứa ít nhất một ký tự và một chữ in hoa',
            'confirm_pass.required' => 'Xác nhận mật khẩu không được bỏ trống',
            'confirm_pass.same' => 'Xác nhận mật khẩu phải trùng với mật khẩu mới',
        ];
    }
}
