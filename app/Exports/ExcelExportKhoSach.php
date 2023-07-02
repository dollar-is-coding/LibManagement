<?php

namespace App\Exports;

use App\Models\KhoSach;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExcelExportKhoSach implements FromQuery, WithMapping, WithTitle, WithHeadings
{
    public function query()
    {
        // return PhieuTraSach::query();
        $latestDate = KhoSach::max('created_at');
        $latestMonth = Carbon::createFromFormat('Y-m-d H:i:s', $latestDate)->format('Y-m');


        // Lọc các bản ghi chỉ trong tháng mới nhất
        return KhoSach::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $latestMonth);
    }

    public function map($khosach): array
    {
        return [
            $khosach->id,
            $khosach->fkSach->ten,
            $khosach->so_luong,
            $khosach->ly_do,
            $created = Carbon::parse($khosach->created_at)->format('Y-m-d'),
            $khosach->$created,
            // Thêm các trường dữ liệu khác tương ứng với cột trong file Excel
        ];
    }

    public function title(): string
    {
        return 'Danh Sách Kho Sách';
    }

    public function headings(): array
    {
        return [
            'STT',
            'Sách',
            'Số lượng',
            'Lý do',
            'Thời gian'
            // Thêm các tiêu đề cho các cột khác tại đây
        ];
    }
}
