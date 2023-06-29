<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='binh_luan';
    protected $fillable=[
        'binh_luan_id',
        'sach_id',
        'nguoi_dung_id',
        'noi_dung',
    ];

    public function hasReply()
    {
        return $this->hasMany(BinhLuan::class,'binh_luan_id')->orderBy('created_at','ASC');
    }

    public function fkBinhLuan()
    {
        return $this->belongsTo(BinhLuan::class,'binh_luan_id');
    }

    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }

    public function fkNguoiDung()
    {
        return $this->belongsTo(NguoiDung::class,'nguoi_dung_id');
    }
}
