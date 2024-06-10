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
        Schema::create('ChiTietPhuTro', function (Blueprint $table) {
            $table->string('MaNv');
            $table->string('SoPhieuGhiNhanPhuTro');
            $table->integer('SoGioPhuTro');
            $table->foreign('MaNv')->references('MaNV')->on('NhanVien');
            $table->foreign('SoPhieuGhiNhanPhuTro')->references('SoPhieuGhiNhanPhuTro')->on('PhieuGhiNhanPhuTro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChiTietPhuTro');
    }
};
