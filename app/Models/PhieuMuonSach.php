<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhieuMuonSach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='phieu_muon_sach';
    protected $fillable=['doc_gia_id','sach_id','so_luong','ngay_muon','ngay_tra','thuc_tra'];

    public function fkDocGia()
    {
        return $this->belongsTo(DocGia::class,'doc_gia_id');
    }

    public function fkSach()
    {
        return $this->belongsTo(Sach::class,'sach_id');
    }
}
