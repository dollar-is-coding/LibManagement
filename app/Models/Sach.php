<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='sach';
    protected $fillable=[
        'ten',
        'ma_sach',
        'tac_gia_id',
        'nha_xuat_ban_id',
        'the_loai_id',
        'nam_xuat_ban',
        'gia_tien',
        'mo_ta',
        'luot_xem',
        'luot_thich',
        'luot_binh_luan',
        'hinh_anh',
        'de_xuat',
    ];
    
    public function hasThuVien()
    {
        return $this->hasOne(ThuVien::class,'sach_id');
    }

    public function hasGioSach()
    {
        return $this->hasMany(GioSach::class,'sach_id');
    }

    public function hasPhieuMuon()
    {
        return $this->hasMany(PhieuMuonSach::class,'sach_id');
    }

    public function hasBinhLuan()
    {
        return $this->hasMany(BinhLuan::class,'sach_id');
    }

    public function hasYeuThich()
    {
        return $this->hasMany(LichSuSach::class,'sach_id');
    }

    public function fkTacGia()
    {
        return $this->belongsTo(TacGia::class,'tac_gia_id');
    }

    public function fkNhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class,'nha_xuat_ban_id');
    }

    public function fkTheLoai()
    {
        return $this->belongsTo(TheLoai::class,'the_loai_id');
    }
}
