<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TruongHoc;

class TruongHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TruongHoc::create(['ten'=>'Trường Phổ thông Năng Khiếu']);
        TruongHoc::create(['ten'=>'Đại học Quốc gia TP.HCM']);
        TruongHoc::create(['ten'=>'Trường THPT chuyên Lê Hồng Phong']);
        TruongHoc::create(['ten'=>'Trường THPT chuyên Trần Đại Nghĩa']);
        TruongHoc::create(['ten'=>'Trường THPT Nguyễn Thượng Hiền']);
        TruongHoc::create(['ten'=>'Trường THPT Gia Định']);
        TruongHoc::create(['ten'=>'Trường THPT Mạc Đĩnh Chi']);
        TruongHoc::create(['ten'=>'Trường THPT Nguyễn Hữu Huân']);
        TruongHoc::create(['ten'=>'Trường THPT Năng khiếu Thể dục Thể thao TP.HCM']);
        TruongHoc::create(['ten'=>'Trường THPT Năng khiếu Thể dục Thể thao Nguyễn Thị Định']);
        TruongHoc::create(['ten'=>'Trường Phổ thông Năng khiếu Thể thao Olympic – Đại học Thể dục Thể thao TPHCM']);
        TruongHoc::create(['ten'=>'Trường THPT Năng khiếu Thể dục Thể thao Bình Chánh']);
    }
}
