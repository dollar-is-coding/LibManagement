<?php

namespace App\Imports;

use App\Models\Sach;
use App\Models\ThuVien;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImportThuVien implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ThuVien([
            'sach_id'=> Sach::latest()->first()->id,
            'tu_sach_id'=>$row[7],
            'khu_vuc_id' => $row[8],
            'sl_con_lai' => $row[9],
        ]);
    }
}
