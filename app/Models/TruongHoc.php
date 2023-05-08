<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TruongHoc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='truong_hoc';
    protected $fillable=['ten'];
}
