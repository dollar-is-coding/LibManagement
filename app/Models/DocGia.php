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
    protected $fillable=['ma_doc_gia','ho','ten','mat_khau','email','ngay_sinh','dien_thoai','gioi_tinh','dia_chi','dang_muon','da_muon'];
}
