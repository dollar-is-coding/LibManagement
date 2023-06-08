<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GioSach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='gio_hang';
    protected $fillable=['sach_id','doc_gia_id'];
}
