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
    protected $fillable=['email','mat_khau','ho','ten','anh_dai_dien','vai_tro'];

    public function getPasswordAttribute()
    {
        return $this->mat_khau;
    }
}
