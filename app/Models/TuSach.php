<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TuSach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='tu_sach';
    protected $fillable=['ten','khu_vuc_id'];

    public function fkKhuVuc()
    {
        return $this->belongsTo(KhuVuc::class);
    }
}
