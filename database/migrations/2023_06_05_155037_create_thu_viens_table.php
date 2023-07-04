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
        Schema::create('thu_vien', function (Blueprint $table) {
            $table->id();
            $table->integer('sach_id');
            $table->integer('tu_sach_id');
            $table->integer('khu_vuc_id');
            $table->integer('sl_con_lai');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thu_vien');
    }
};
