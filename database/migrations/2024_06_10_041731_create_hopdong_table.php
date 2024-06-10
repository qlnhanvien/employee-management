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
        Schema::create('HopDong', function (Blueprint $table) {
            $table->string('SoHopDong')->primary();
            $table->string('MaLoaiHopDong');
            $table->string('MaNV');
            $table->date('NgayLapHopDong');
            $table->text('NoiDungHopDong');
            $table->foreign('MaLoaiHopDong')->references('MaLoaiHopDong')->on('LoaiHopDong');
            $table->foreign('MaNV')->references('MaNV')->on('NhanVien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HopDong');
    }
};
