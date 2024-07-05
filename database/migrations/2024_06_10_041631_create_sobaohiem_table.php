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
        Schema::create('SoBaoHiem', function (Blueprint $table) {
            $table->string('MaSoBaoHiem')->primary();
            $table->string('MaNV');
            $table->date('NgayLapSoBaoHiem');
            $table->date('ThoiHanSoBaoHiem');
            $table->unsignedBigInteger('idBH');
            $table->foreign('MaNV')->references('MaNV')->on('NhanVien');
            $table->foreign('idBH')->references('idBH')->on('BaoHiem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SoBaoHiem');
    }
};
