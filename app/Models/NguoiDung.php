<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class NguoiDung extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table='nguoi_dung';
    protected $fillable = [
        'ho',
        'ten',
        'mat_khau',
        'ngay_sinh',
        'email',
        'dien_thoai',
        'gioi_tinh',
        'vai_tro',
        'hinh_anh'
    ];

    public function getPasswordAttribute()
    {
        return $this->mat_khau;
    }
}