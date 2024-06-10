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
        Schema::create('PhongBan', function (Blueprint $table) {
            $table->string('MaPhongBan')->primary();
            $table->string('TenPhongBan');
            $table->string('DienThoaiPhongBan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PhongBan');
    }
};
