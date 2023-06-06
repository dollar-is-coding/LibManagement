<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KhuVuc;

class KhuVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhuVuc::create(['ten'=>'Khu A']);
        KhuVuc::create(['ten'=>'Khu B']);
    }
}
