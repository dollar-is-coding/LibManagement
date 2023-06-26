<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LienHe extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='lien_he';
    protected $fillable=['tieu_de','noi_dung','dang_chu_y'];
}
