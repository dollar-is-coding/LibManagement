<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KhuVucSeeder::class,
            TuSachSeeder::class,
            NhaXuatBanSeeder::class,
            TacGiaSeeder::class,
            TheLoaiSeeder::class,
            SachSeeder::class,
            ThuVienSeeder::class,
            NguoiDungSeeder::class,
        ]);
    }
}
