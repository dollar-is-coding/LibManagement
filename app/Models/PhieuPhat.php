<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuPhat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='phieu_phat';
    protected $fillable = ['ma_phieu_phat','ma_phieu_muon','sach_id','ly_do','tien_phat','tong_tien_phat'];
    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }
}
