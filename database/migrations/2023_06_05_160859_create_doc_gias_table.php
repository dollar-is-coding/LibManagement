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
            $table->string('ma_doc_gia');
            $table->string('mat_khau');
            $table->string('ho');
            $table->string('ten');
            $table->string('email');
            $table->string('dien_thoai');
            $table->tinyInteger('gioi_tinh');
            $table->date('ngay_sinh');
            $table->string('dia_chi');
            $table->integer('dang_muon');
            $table->integer('da_muon');
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
