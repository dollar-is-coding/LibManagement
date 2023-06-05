<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThuVien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='thu_vien';
    protected $fillable=['sach_id','tu_sach_id','khu_vuc_id','dang_muon','da_muon','sl_con_lai'];
}
