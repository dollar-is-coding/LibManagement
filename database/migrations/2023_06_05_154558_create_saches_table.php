<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('ma_sach');
            $table->integer('tac_gia_id');
            $table->integer('nha_xuat_ban_id');
            $table->integer('the_loai_id');
            $table->integer('nam_xuat_ban');
            $table->integer('gia_tien');
            $table->text('mo_ta');
            $table->integer('luot_xem')->default(0);
            $table->integer('luot_thich')->default(0);
            $table->integer('luot_binh_luan')->default(0);
            $table->string('hinh_anh');
            $table->boolean('de_xuat')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach');
    }
};
