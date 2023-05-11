<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NhaXuatBan;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhaXuatBan::create(['ten'=>'Nhà xuất bản Kim Đồng']);
        NhaXuatBan::create(['ten'=>'Nhà xuất bản Công Thương']);
        NhaXuatBan::create(['ten'=>'Nhà xuất bản Dân Trí']);
        NhaXuatBan::create(['ten'=>'Nhà xuất bản Hội Nhà Văn']);
    }
}
