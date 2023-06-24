<?php

namespace App\Imports;

use App\Models\NguoiDung;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new NguoiDung([
            'ho' => $row['ho'],
            'ten' => $row['ten'],
            'ma_hs' => $row['ma_hs'],
            'ngay_sinh' => date('Y-m-d', strtotime($row['ngay_sinh'])),
            'gioi_tinh' => $row['gioi_tinh'],
            'email' => $row['email'],
            'mat_khau' => password_hash($row['mat_khau'], PASSWORD_DEFAULT),
            'vai_tro' => 3,
            'hinh_anh' => '',
            'dien_thoai' => '',
        ]);
    }
}
