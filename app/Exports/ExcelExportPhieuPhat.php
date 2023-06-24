<?php

namespace App\Exports;

use App\Models\PhieuPhat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;



class ExcelExportPhieuPhat implements FromQuery, WithMapping, WithTitle, WithHeadings
{
    public function query()
    {
        // return PhieuPhat::query();
        // Lấy tháng mới nhất
        $latestDate = PhieuPhat::max('created_at');
        $latestMonth = Carbon::createFromFormat('Y-m-d H:i:s', $latestDate)->format('Y-m');

        // Lọc các bản ghi chỉ trong tháng mới nhất
        return PhieuPhat::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $latestMonth);
    }

    public function map($phieuphat): array
    {
        return [
            $phieuphat->id,
            $phieuphat->ma_phieu,
            $phieuphat->fkthuThu->ten,
            $phieuphat->fkDocGia->ten,
            $phieuphat->fkSach->ten,
            $phieuphat->ly_do,
            $phieuphat->tong_tien_phat,
            $created = Carbon::parse($phieuphat->created_at)->format('Y-m-d'),
            $phieuphat->created,
           
        ];
    }


    public function title(): string
    {
        return 'Danh sách Phiếu Phạt';
    }

    public function headings(): array
    {
        return [
            'STT',
            'Mã phiếu',
            'Thủ thư',
            'Đọc giả',
            'Tên sách',
            'Lý do',
            'Tổng tiền phạt',
            'Ngày trả',
            // Thêm các tiêu đề cho các cột khác tại đây
        ];
    }
}