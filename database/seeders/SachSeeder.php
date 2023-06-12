<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sach;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = 0;
        $b = 25;
        for ($i = 1; $i > $a && $i < $b; $i++) {
            Sach::create([
                'ten' => 'Tiếng anh '.strval($i),
                'ma_sach' => $i,
                'tac_gia_id' => 1,
                'nha_xuat_ban_id' => 1,
                'the_loai_id' => '1',
                'nam_xuat_ban' => 2012,
                'hinh_anh' => '',
                'mo_ta'=>'Sách hay lắm đó nhen'
            ]);
        }
        
    }
}
