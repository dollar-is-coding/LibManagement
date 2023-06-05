<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapTaiKhoanRequest extends FormRequest
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
            'ho'=>'required',
            'ten'=>'required',
            'vai_tro'=>'required',
            'email'=>'required|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [
            'ho.required'=>'Họ không được bỏ trống',
            'ten.required'=>'Tên không được bỏ trống',
            'vai_tro'=>'Vai trò không được bỏ trống',
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Email không đúng định dạng'
        ];
    }
}
