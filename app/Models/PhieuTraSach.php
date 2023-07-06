<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuTraSach extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'phieu_tra_sach';
    protected $fillable = ['ma_phieu_muon', 'thu_thu_id', 'trang_thai'];
    public function fkNguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'thu_thu_id');
    }
}
