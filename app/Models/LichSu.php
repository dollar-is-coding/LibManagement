<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichSu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='lich_su';
    protected $fillable=['doc_gia_id','sach_id','da_xem','da_thich'];
    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }

    public function fkDocGia()
    {
        return $this->belongsTo(NguoiDung::class,'doc_gia_id','id');
    }
}
