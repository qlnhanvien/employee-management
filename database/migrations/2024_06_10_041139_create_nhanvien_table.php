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
        Schema::create('NhanVien', function (Blueprint $table) {
            $table->string('MaNV')->primaryprimary();
            $table->string('TenNV');
            $table->boolean('Phai');
            $table->date('NgaySinh');
            $table->string('DiaChiNV');
            $table->string('DienThoaiNV');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NhanVien');
    }
};
