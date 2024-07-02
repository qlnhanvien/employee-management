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
        Schema::create('ChucVu', function (Blueprint $table) {
            $table->id('MaChucVu')->primary();
            $table->string('TenChucVu');
            $table->decimal('HeSoLuong', 10, 2);
            $table->string('PhuCapChucVu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChucVu');
    }
};
