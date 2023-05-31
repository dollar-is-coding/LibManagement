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
            $table->integer('doc_gia_id');
            $table->integer('sach_id');
            $table->integer('so_luong');
            $table->date('ngay_muon');
            $table->date('ngay_tra');
            $table->date('thuc_tra');
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