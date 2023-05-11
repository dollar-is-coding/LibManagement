<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sach;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sach::create([
            'ten'=>'Bắt đầu với câu hỏi vì sao',
            'the_loai_id'=>4,
            'tac_gia_id'=>4,
            'nha_xuat_ban_id'=>3,
            'nam_xuat_ban'=>2018,
            'tom_tat'=>'Sách về phát triển bản thân',
            'hinh_anh'=>''
        ]);
    }
}
