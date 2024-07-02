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
        Schema::create('ChiTietQuyetDinhChucVu', function (Blueprint $table) {
            $table->unsignedBigInteger('SoQuyetDinhChucVu');
            $table->unsignedBigInteger('MaChucVu');
            $table->foreign('SoQuyetDinhChucVu')->references('SoQuyetDinhChucVu')->on('QuyetDinhChucVu');
            $table->foreign('MaChucVu')->references('MaChucVu')->on('ChucVu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChiTietQuyetDinhChucVu');
    }
};
