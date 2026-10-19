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
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->decimal('stok_awal', 11, 2)->nullable();
            $table->decimal('stok_masuk', 11, 2)->nullable();
            $table->decimal('stok_keluar', 11, 2)->nullable();
            $table->decimal('keluar_buah_utuh', 11, 2)->nullable();
            $table->decimal('buah_susut', 11, 2)->nullable();
            $table->decimal('buah_tidak_bisa_digunakan', 11, 2)->nullable();
            $table->decimal('buah_prep', 11, 2)->nullable();
            $table->decimal('buah_prep_rusak', 11, 2)->nullable();
            $table->decimal('stok_akhir', 11, 2)->nullable();
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
