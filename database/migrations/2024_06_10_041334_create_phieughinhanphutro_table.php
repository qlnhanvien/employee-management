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
        Schema::create('PhieuGhiNhanPhuTro', function (Blueprint $table) {
            $table->string('SoPhieuGhiNhanPhuTro')->primary();
            $table->date('NgayPhuTro');
            $table->string('HinhThucPhuTro');
            $table->integer('HeSoPhuTro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PhieuGhiNhanPhuTro');
    }
};
