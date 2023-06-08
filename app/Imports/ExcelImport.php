<?php

namespace App\Imports;

use App\Models\Sach;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sach([
            'ten' => $row[0],
            'ma_sach' => $row[1],
            'tac_gia_id' => $row[2],
            'nha_xuat_ban_id' => $row[3],
            'the_loai_id' => $row[4],
            'nam_xuat_ban' => $row[5],
            'hinh_anh' => $row[6],
        ]);
    }
}
