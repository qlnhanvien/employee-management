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
        Schema::create('PhuCap_Luong', function (Blueprint $table) {
            $table->string('SoQuyetDinhLuong');
            $table->string('MaPhuCap');
            $table->foreign('SoQuyetDinhLuong')->references('SoQuyetDinhLuong')->on('QuyetDinhLuong');
            $table->foreign('MaPhuCap')->references('MaPhuCap')->on('PhuCap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PhuCap_Luong');
    }
};
