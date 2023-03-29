<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TacGia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='tac_gia';
    protected $fillable=['ten'];
}
