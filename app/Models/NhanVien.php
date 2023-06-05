<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='nhan_vien';
    protected $fillable=['ho','ten','mat_khau','email','dien_thoai','gioi_tinh','vai_tro'];
}
