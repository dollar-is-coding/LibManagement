<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TuSach;

class TuSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TuSach::create(['ten'=>'Tủ A','khu_vuc_id'=>1]);
        TuSach::create(['ten'=>'Tủ B','khu_vuc_id'=>2]);
        TuSach::create(['ten'=>'Tủ C','khu_vuc_id'=>2]);
    }
}
