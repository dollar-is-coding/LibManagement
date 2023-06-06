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
            'ten'=>'Tiếng anh 10',
            'ma_sach'=>'TA10',
            'tac_gia_id'=>1,
            'nha_xuat_ban_id'=>1,
            'the_loai_id'=>'1',
            'nam_xuat_ban'=>2012,
            'hinh_anh'=>''
        ]);
    }
}
