<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ThuVien;

class ThuVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThuVien::create([
            'sach_id'=>1,
            'tu_sach_id'=>1,
            'khu_vuc_id'=>1,
            'sl_con_lai'=>20
        ]);
    }
}
