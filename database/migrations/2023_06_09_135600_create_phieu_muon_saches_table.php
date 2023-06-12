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
        Schema::create('phieu_muon_sach', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phieu_muon');
            $table->integer('doc_gia_id');
            $table->integer('thu_thu_id')->nullable();
            $table->integer('sach_id');
            $table->integer('so_luong')->default(1);
            $table->timestamp('ngay_lap_phieu')->useCurrent();
            $table->date('han_tra');
            $table->integer('trang_thai')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_muon_sach');
    }
};
