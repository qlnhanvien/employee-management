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
        Schema::create('QuyetDinhTuyenDung', function (Blueprint $table) {
            $table->id('SoQuyetDinhTuyenDung')->primary();
            $table->date('NgayQuyetDinhTuyenDung');
            $table->integer('ThoiGianThuViec')->nullable();
            $table->decimal('MucLuongThuViec', 10, 2)->nullable();
            $table->text('NoiDungQuyetDinhTuyenDung');
            $table->string('MaNV');
            $table->string('MaPhongBan');
            $table->foreign('MaNV')->references('MaNV')->on('NhanVien');
            $table->foreign('MaPhongBan')->references('MaPhongBan')->on('PhongBan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('QuyetDinhTuyenDung');
    }
};
