<?php

namespace App\Imports;

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
           'sach_id'=>$row[1],
        ]);
    }
}
