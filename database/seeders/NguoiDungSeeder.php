<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NguoiDung::create([
            'email'=>'quantrivien.dollar@gmail.com',
            'mat_khau'=>hash::make("quantrivien01"),
            'ho'=>'Nguyễn',
            'ten'=>'Văn Đô',
            'gioi_tinh'=>1,
            'anh_dai_dien'=>'',
            'vai_tro'=>1
        ]);
        NguoiDung::create([
            'email'=>'quantrivien.zuangzinh@gmail.com',
            'mat_khau'=>hash::make("quantrivien02"),
            'ho'=>'Phạm',
            'ten'=>'Nguyễn Quanh Zinh',
            'gioi_tinh'=>0,
            'anh_dai_dien'=>'',
            'vai_tro'=>1
        ]);
    }
}
