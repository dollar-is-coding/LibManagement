<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SachRequest extends FormRequest
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
            'ten_sach'=>'required',
            'tac_gia'=>'required',
            'the_loai'=>'required',
            'nha_xuat_ban'=>'required',
            'so_luong'=>'required',
            'nam_xuat_ban'=>'required',
            'tu_sach'=>'required',
            'khu_vuc'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'ten_sach.required'=>'Tên sách không được bỏ trống',
            'tac_gia.required'=>'Tác giả không được bỏ trống',
            'the_loai.required'=>'Thể loại không được bỏ trống',
            'nha_xuat_ban.required'=>'Nhà xuất bản không được bỏ trống',
            'so_luong.required'=>'Không bỏ trống',
            'nam_xuat_ban.required'=>'Năm xuất bản không được bỏ trống',
            'tu_sach.required'=>'Tủ sách không được bỏ trống',
            'khu_vuc.required'=>'Không bỏ trống'
        ];
    }
}
