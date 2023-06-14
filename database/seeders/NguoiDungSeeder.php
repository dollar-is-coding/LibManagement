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
        NguoiDung::create([
            'ho' => 'Dinh',
            'ten' => 'Dinh',
            'mat_khau' => Hash::make('12345678'),
            'email' => '0306201403@caothang.edu.vn',
            'dien_thoai' => '0834578556',
            'gioi_tinh' => 1,
            'ngay_sinh' => '2002/01/22',
            'vai_tro' => 1,
            'hinh_anh' => '',
        ]);
        NguoiDung::create([
            'ho' => 'Dinh',
            'ten' => 'Dinh',
            'mat_khau' => Hash::make('12345678'),
            'email' => '1306201403@caothang.edu.vn',
            'dien_thoai' => '0834578556',
            'gioi_tinh' => 1,
            'ngay_sinh' => '2002/01/22',
            'vai_tro' => 2,
            'hinh_anh' => '',
        ]);
        NguoiDung::create([
            'ho' => 'Dinh',
            'ten' => 'Dinh',
            'mat_khau' => Hash::make('12345678'),
            'email' => null,
            'dien_thoai' => null,
            'gioi_tinh' => 1,
            'ngay_sinh' => '2002/01/22',
            'vai_tro' => 3,
            'hinh_anh' => '',
        ]);
    }
}
