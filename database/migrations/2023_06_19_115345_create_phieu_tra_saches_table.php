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
        Schema::create('phieu_tra_sach', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phieu_muon');
            $table->integer('thu_thu_id');
            $table->boolean('trang_thai'); // Trả đúng hạn hoặc không
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_tra_sach');
    }
};
