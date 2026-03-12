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
        Schema::create('detail_permintaan_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_inventori')->references('id')->on('inventori')->onDelete('cascade');
            $table->foreignId('id_laporan_permintaan')->references('id')->on('laporan_permintaan_bahan_baku')->onDelete('cascade');
            $table->integer('qty_request');
            $table->integer('qty_approve')->nullable();
            $table->string('keterangan_manager')->nullable();
            $table->string('keterangan_finance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_permintaan_bahan_baku');
    }
};
