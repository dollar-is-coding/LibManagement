<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ThuVien;

class ThuVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a=0;
        $b=100;
        for($i =1;$i>$a && $i<$b;$i++){
            ThuVien::create([
                'sach_id' => $i,
                'tu_sach_id' => 1,
                'khu_vuc_id' => 1,
                'sl_con_lai' => 20
            ]);
        }
        
    }
}
