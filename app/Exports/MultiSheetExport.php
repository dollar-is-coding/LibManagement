<?php

namespace App\Exports;

use App\Models\KhoSach;
use App\Models\PhieuPhat;
use App\Models\PhieuTraSach;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [
            'Danh sách Phiếu Trả Sách' => new ExcelExport(PhieuTraSach::query()),
            'Danh sách Phiếu Phạt' => new ExcelExportPhieuPhat(PhieuPhat::query()),
            'Danh sách kho sách' => new ExcelExportKhoSach(KhoSach::query())
        ];

        return $sheets;
    }
}

