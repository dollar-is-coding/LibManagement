<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuonSachRequest extends FormRequest
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
            'ma_so'=>'required',
            'sach'=>'required',
            'ngay_tra'=>'required|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            'ma_so.required'=>'Vui lòng chọn mã số độc giả',
            'sach.required'=>'Vui lòng chọn sách',
            'ngay_tra.required'=>'Ngày trả không được bỏ trống',
            'ngay_tra.after'=>'Ngày trả phải sau ngày mai',
        ];
    }
}
