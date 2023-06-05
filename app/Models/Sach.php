<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='sach';
    protected $fillable=['ten','ma_sach','ten','tac_gia_id','nha_xuat_ban_id','the_loai_id','nam_xuat_ban'];
}
