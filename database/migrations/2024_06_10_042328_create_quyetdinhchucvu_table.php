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
        Schema::create('QuyetDinhChucVu', function (Blueprint $table) {
            $table->id('SoQuyetDinhChucVu')->primary();
            $table->string('MaNV');
            $table->date('NgayQuyetDinhChucVu');
            $table->foreign('MaNV')->references('MaNV')->on('NhanVien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('QuyetDinhChucVu');
    }
};
