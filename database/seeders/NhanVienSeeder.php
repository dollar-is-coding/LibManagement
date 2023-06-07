<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhanVien::create([
            'ho' => 'Dinh',
            'ten' => 'Dinh',
            'mat_khau'=> Hash::make('12345678'),
            'email'=>'0306201403@caothang.edu.vn',
            'dien_thoai'=>'0834578556',
            'gioi_tinh'=>1,
            'vai_tro'=>1,
        ]);
    }
}
