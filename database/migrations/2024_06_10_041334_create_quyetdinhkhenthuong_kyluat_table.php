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
        Schema::create('QuyetDinhKhenThuong_KyLuat', function (Blueprint $table) {
            $table->string('SoQuyetDinhKhenThuong_KyLuat')->primary();
            $table->date('NgayQuyetDinhKhenThuong_KyLuat');
            $table->text('NoiDungQuyetDinhKhenThuong_KyLuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('QuyetDinhKhenThuong_KyLuat');
    }
};
