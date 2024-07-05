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
        Schema::create('BaoHiem', function (Blueprint $table) {
            $table->id('idBH')->primary();
            $table->string('MaBaoHiem', 10);
            $table->string('TenBaoHiem', 50);
            $table->string('TileBaoHiem', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BaoHiem');
    }
};
