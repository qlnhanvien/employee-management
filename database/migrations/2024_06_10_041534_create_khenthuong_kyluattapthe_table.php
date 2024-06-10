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
        Schema::create('KhenThuong_KyLuatTapThe', function (Blueprint $table) {
            $table->string('SoQuyetDinhKhenThuong_KyLuat');
            $table->string('MaPhongBan');
            $table->decimal('SoTienKhenThuong_KyLuatTapThe', 10, 2);
            $table->foreign('SoQuyetDinhKhenThuong_KyLuat')->references('SoQuyetDinhKhenThuong_KyLuat')->on('QuyetDinhKhenThuong_KyLuat');
            $table->foreign('MaPhongBan')->references('MaPhongBan')->on('PhongBan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('KhenThuong_KyLuatTapThe');
    }
};
