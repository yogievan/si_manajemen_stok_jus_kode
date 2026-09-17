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
        Schema::create('detail_laporan_stok_harian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_laporan_stok_harian')->references('id')->on('laporan_stok_harian')->onDelete('cascade');
            $table->foreignId('id_inventori')->references('id')->on('inventori')->onDelete('cascade');
            $table->integer('stok_awal')->nullable();
            $table->integer('stok_masuk')->nullable();
            $table->integer('stok_keluar')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->integer('stok_akhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan_stok_harian');
    }
};
