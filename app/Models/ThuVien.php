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
    protected $fillable=['sach_id','tu_sach_id','so_luong'];
    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }
    public function fkTuSach()
    {
        return $this->belongsTo(TuSach::class,'tu_sach_id');
    }
}
