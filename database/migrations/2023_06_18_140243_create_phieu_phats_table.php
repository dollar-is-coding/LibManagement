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
        Schema::create('phieu_phat', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phiet_phat');
            $table->string('ma_phieu_muon');
            $table->integer('sach_id');
            $table->string('ly_do');
            $table->integer('tien_phat');
            $table->integer('tong_tien_phat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_phat');
    }
};
