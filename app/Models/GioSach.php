<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GioSach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='gio_sach';
    protected $fillable=['sach_id','doc_gia_id'];

    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }

    public function fkDocGia()
    {
        return $this->belongsTo(DocGia::class,'doc_gia_id');
    }
}
