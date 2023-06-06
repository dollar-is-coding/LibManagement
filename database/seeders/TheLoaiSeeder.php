<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TheLoai;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TheLoai::create(['ten'=>'Sách giáo khoa']);
        TheLoai::create(['ten'=>'Sách tham khảo']);
        TheLoai::create(['ten'=>'Sách phát triển bản thân']);
        TheLoai::create(['ten'=>'Sách kỹ năng sống']);
    }
}
