<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TacGia;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TacGia::create(['ten'=>'Nhiều tác giả']);
        TacGia::create(['ten'=>'Đặng Hoàng Giang']);
        TacGia::create(['ten'=>'Chi Nguyễn']);
        TacGia::create(['ten'=>'Nguyễn Phi Vân']);
        TacGia::create(['ten'=>'Simon Sinek']);
        TacGia::create(['ten'=>'Dale Carnegie']);
    }
}
