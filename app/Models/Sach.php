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
        'the_loai_id',
        'tac_gia_id',
        'nha_xuat_ban_id',
        'nam_xuat_ban',
        'tom_tat',
        'hinh_anh'
    ];
    
    public function fkTheLoai()
    {
        return $this->belongsTo(TheLoai::class,'the_loai_id');
    }

    public function fkTacGia()
    {
        return $this->belongsTo(TacGia::class,'tac_gia_id');
    }

    public function fkNhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class,'nha_xuat_ban_id');
    }

    public function hasThuVien()
    {
        return $this->hasMany(ThuVien::class,'sach_id','id');
    }
}
