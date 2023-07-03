<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichSuTinTuc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='lich_su_tin_tuc';
    protected $fillable=['doc_gia_id','tin_tuc_id'];
}
