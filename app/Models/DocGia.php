<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocGia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='doc_gia';
    protected $fillable=[
        'ma_so',
        'ho',
        'ten',
        'so_dien_thoai',
        'email',
        'ngay_sinh',
        'gioi_tinh',
        'dia_chi',
        'lop',
        'sgk',
        'sach_khac'
    ];
}
