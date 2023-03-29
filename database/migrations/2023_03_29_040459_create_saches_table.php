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
            $table->integer('the_loai_id');
            $table->integer('tac_gia_id');
            $table->integer('nha_xuat_ban_id');
            $table->integer('nam_xuat_ban');
            $table->string('tom_tat');
            $table->string('hinh_anh');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saches');
    }
};
