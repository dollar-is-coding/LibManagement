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
        Schema::create('lich_su', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_gia_id');
            $table->integer('sach_id');
            $table->boolean('da_xem');
            $table->boolean('da_thich');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su');
    }
};
