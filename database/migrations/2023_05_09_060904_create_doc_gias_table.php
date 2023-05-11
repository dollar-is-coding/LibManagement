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
        Schema::create('doc_gia', function (Blueprint $table) {
            $table->id();
            $table->string('ma_so');
            $table->string('ho');
            $table->string('ten');
            $table->boolean('gioi_tinh');
            $table->string('so_dien_thoai');
            $table->date('ngay_sinh');
            $table->string('dia_chi');
            $table->string('lop');
            $table->integer('truong_hoc_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_gia');
    }
};
