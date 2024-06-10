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
            $table->string('MaNv');
            $table->date('NgayLapSoBaoHiem');
            $table->date('ThoiHanSoBaoHiem');
            $table->string('MaBaoHiem');
            $table->foreign('MaNv')->references('MaNV')->on('NhanVien');
            $table->foreign('MaBaoHiem')->references('MaBaoHiem')->on('BaoHiem');
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
