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
        TheLoai::create(['ten'=>'Tiểu thuyết']);
        TheLoai::create(['ten'=>'Kinh dị']);
        TheLoai::create(['ten'=>'Tiểu thuyết']);
        TheLoai::create(['ten'=>'Kỹ năng sống']);
        TheLoai::create(['ten'=>'Tản văn']);
    }
}
