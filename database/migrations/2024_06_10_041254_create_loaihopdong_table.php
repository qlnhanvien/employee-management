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
        Schema::create('LoaiHopDong', function (Blueprint $table) {
            $table->string('MaLoaiHopDong')->primary();
            $table->string('TenLoaiHopDong');
            $table->integer('ThoiHanHopDong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LoaiHopDong');
    }
};
