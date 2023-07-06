<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuPhat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='phieu_phat';
    protected $fillable=[
        'doc_gia_id',
        'thu_thu_id',
        'ma_phieu',
        'sach_id',
        'so_luong',
        'ly_do',
        'tien_phat',
        'tong_tien_phat',
        'tong_so_sach',
    ];
    public function fkThuThu()
    {
        return $this->belongsTo(NguoiDung::class, 'thu_thu_id');
    }
    public function fkDocGia()
    {
        return $this->belongsTo(NguoiDung::class, 'doc_gia_id');
    }
    public function fkSach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }
    public function fkNguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'doc_gia_id');
    }
}
