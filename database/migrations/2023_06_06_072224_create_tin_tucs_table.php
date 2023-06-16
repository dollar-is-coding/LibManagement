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
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('anh_bia');
            $table->text('noi_dung');
            $table->integer('luot_xem')->default('0');
            $table->integer('luot_thich')->default('0');
            $table->integer('luot_binh_luan')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_tuc');
    }
};
