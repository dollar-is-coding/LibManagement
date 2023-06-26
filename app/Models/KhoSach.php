<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhoSach extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='kho_sach';
    protected $fillable=['sach_id','thu_thu_id','ly_do','so_luong'];
    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }
    public function fkNguoiDung()
    {
        return $this->belongsTo(NguoiDung::class,'thu_thu_id');
    }
}
