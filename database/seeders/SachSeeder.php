<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sach;
use App\Models\ThuVien;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 150; $i++) { 
            if ($i <= 30) {
                Sach::create([
                    'ten' => 'Tiếng anh '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 1,
                    'nam_xuat_ban' => 2012,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            } elseif($i <= 50) {
                Sach::create([
                    'ten' => 'Sách tham khảo '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 2,
                    'nam_xuat_ban' => 2012,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            } elseif($i <= 60) {
                Sach::create([
                    'ten' => 'Ngữ văn '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 3,
                    'nam_xuat_ban' => 2012,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            } elseif($i <= 85) {
                Sach::create([
                    'ten' => 'Khoa học '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 4,
                    'nam_xuat_ban' => 2020,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            } elseif($i < 108) {
                Sach::create([
                    'ten' => 'Phát triển kỹ năng '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 5,
                    'nam_xuat_ban' => 2020,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            } else {
                Sach::create([
                    'ten' => 'Báo hoa học trò số '.strval($i),
                    'ma_sach' => $i,
                    'tac_gia_id' => 1,
                    'nha_xuat_ban_id' => 1,
                    'the_loai_id' => 6,
                    'nam_xuat_ban' => 2020,
                    'hinh_anh' => '',
                    'mo_ta'=>'Sách hay lắm đó nhen'
                ]);
                $id =Sach::where('ma_sach',$i)->first();;
                ThuVien::create([
                    'sach_id' => $id->id,
                    'tu_sach_id' => 1,
                    'khu_vuc_id' => 1,
                    'sl_con_lai' => 20
                ]);
            }
            
        }
        
    }
}
