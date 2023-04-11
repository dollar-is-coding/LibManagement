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
        for ($i=0; $i < 5; $i++) { 
            NguoiDung::create([
                'email'=>"admin{$i}@gmail.com",
                'mat_khau'=>hash::make("adminnn{$i}"),
                'ho'=>'Nguyen',
                'ten'=>"Admin{$i}",
                'anh_dai_dien'=>'',
                'vai_tro'=>1,
            ]);
        }
    }
}
