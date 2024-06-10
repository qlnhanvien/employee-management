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
        Schema::create('QuyetDinhLuong', function (Blueprint $table) {
            $table->string('SoQuyetDinhLuong')->primary();
            $table->string('MaNV');
            $table->date('MucLuongCoBan');
            $table->date('NgayQuyetDinhLuong');
            $table->foreign('MaNV')->references('MaNV')->on('NhanVien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('QuyetDinhLuong');
    }
};
