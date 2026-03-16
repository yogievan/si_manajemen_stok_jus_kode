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
        Schema::create('detail_kedatangan_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_laporan_kedatangan')->references('id')->on('laporan_kedatangan_bahan_baku')->onDelete('cascade');
            $table->foreignId('id_inventori')->references('id')->on('inventori')->onDelete('cascade');
            $table->timestamp('tgl_kedatangan')->nullable();
            $table->integer('total_terima')->nullable();
            $table->string('status_manager')->nullable();
            $table->string('keterangan_manager')->nullable();
            $table->string('status_finance')->nullable();
            $table->string('keterangan_finance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kedatangan_bahan_baku');
    }
};
