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
        TheLoai::create(['ten'=>'Sách giáo khoa','so_luong'=>25]);
        TheLoai::create(['ten'=>'Sách tham khảo','so_luong'=>0]);
        TheLoai::create(['ten'=>'Sách phát triển kỹ năng sống','so_luong'=>0]);
        TheLoai::create(['ten'=>'Báo, tạp chí','so_luong'=>0]);
        TheLoai::create(['ten'=>'Sách khoa học','so_luong'=>0]);
        TheLoai::create(['ten'=>'Sách lịch sử','so_luong'=>0]);
    }
}
