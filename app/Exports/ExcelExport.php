<?php

namespace App\Exports;

use App\Models\PhieuTraSach;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExcelExport implements FromQuery, WithMapping, WithTitle, WithHeadings
{
    public function query()
    {
        // Lấy tháng mới nhất
        $latestDate = PhieuTraSach::max('created_at');
        $latestMonth = Carbon::createFromFormat('Y-m-d H:i:s', $latestDate)->format('Y-m');

        // Trừ đi 1 tháng từ tháng mới nhất
        $previousMonth = Carbon::createFromFormat('Y-m', $latestMonth)->subMonth()->format('Y-m');

        // Lọc các bản ghi chỉ trong tháng mới nhất
        return PhieuTraSach::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $previousMonth);
    }


    public function map($phieuTraSach): array
    {
        return [
            $phieuTraSach->id,
            $phieuTraSach->ma_phieu_muon,
            $phieuTraSach->fkNguoiDung->ten,
            $created = Carbon::parse($phieuTraSach->created_at)->format('Y-m-d'),
            $phieuTraSach->$created,
            // Thêm các trường dữ liệu khác tương ứng với cột trong file Excel
        ];
    }

    public function title(): string
    {
        return 'Danh sách Phiếu Trả Sách';
    }

    public function headings(): array
    {
        return [
            'STT',
            'Mã phiếu mượn',
            'Thủ thư',
            'Ngày trả',
            // Thêm các tiêu đề cho các cột khác tại đây
        ];
    }
}
