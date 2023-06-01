<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapTheRequest extends FormRequest
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
            'lop'=>'required',
            'ngay_sinh'=>'required',
            'ngay_sinh'=>'required|before:01/01/2009',
            'so_dien_thoai'=>'required|min:10|max:10',
            'email'=>'required|email:rfc,dns',
            'dia_chi'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'ho.required'=>'Họ không được bỏ trống',
            'ten.required'=>'Tên không được bỏ trống',
            'lop.required'=>'Lớp không được bỏ trống',
            'ngay_sinh.required'=>'Ngày sinh không được bỏ trống',
            'ngay_sinh.before'=>'Chưa đủ tuổi - tối thiểu 31/12/2008',
            'so_dien_thoai.required'=>'Số điện thoại không được bỏ trống',
            'so_dien_thoai.min'=>'Số điện thoại phải gồm 10 số',
            'so_dien_thoai.max'=>'Số điện thoại phải gồm 10 số',
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Email chưa đúng định dạng',
            'dia_chi.required'=>'Địa chỉ không được bỏ trống'
        ];
    }
}
