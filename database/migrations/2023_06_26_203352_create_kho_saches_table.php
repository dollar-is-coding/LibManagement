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
        Schema::create('kho_sach', function (Blueprint $table) {
            $table->id();
            $table->integer('sach_id');
            $table->integer('thu_thu_id');
            $table->string('ly_do');
            $table->integer('so_luong');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kho_sach');
    }
};
