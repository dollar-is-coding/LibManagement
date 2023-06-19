<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuMuonSach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='phieu_muon_sach';
    protected $fillable=[
        'ma_phieu_muon',
        'doc_gia_id',
        'thu_thu_id',
        'sach_id',
        'so_luong',
        'han_tra',
        'tong_so_luong',
        'trang_thai',
    ];

    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }
    public function fkNguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'doc_gia_id');
    }
    public function fkThuThu()
    {
        return $this->belongsTo(NguoiDung::class, 'thu_thu_id');
    }
}
