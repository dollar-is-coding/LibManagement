<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhaXuatBan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='nha_xuat_ban';
    protected $fillable=['ten'];
}
