<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuVuc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='khu_vuc';
    protected $fillable=['ten'];
}
