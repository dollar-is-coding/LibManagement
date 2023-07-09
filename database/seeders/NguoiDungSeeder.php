<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // NguoiDung::create([
        //     'ho' => 'Nguyễn',
        //     'ten' => 'Đô',
        //     'mat_khau' => Hash::make('vando0705'),
        //     'email' => '0306201322@caothang.edu.vn',
        //     'gioi_tinh' => 1,
        //     'ngay_sinh' => '2002/01/22',
        //     'vai_tro' => 1,
        //     'hinh_anh' => '',
        //     'ma_hs' => '',
        // ]);
        NguoiDung::create([
            'ho' => 'Phạm',
            'ten' => 'Vinh',
            'mat_khau' => Hash::make('quangvinh2201'),
            'email' => '0306201403@caothang.edu.vn',
            'gioi_tinh' => 1,
            'ngay_sinh' => '2002/01/22',
            'vai_tro' => 2,
            'hinh_anh' => '',
            'ma_hs' => '',
        ]);
    }
}
