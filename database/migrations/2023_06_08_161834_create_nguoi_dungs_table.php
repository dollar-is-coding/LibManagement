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
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id();
            $table->string('ho');
            $table->string('ten');
            $table->string('ma_hs')->default('0');
            $table->date('ngay_sinh');
            $table->tinyInteger('gioi_tinh');
            $table->string('email');
            $table->string('mat_khau');
            $table->tinyInteger('vai_tro');
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
        Schema::dropIfExists('nguoi_dung');
    }
};
