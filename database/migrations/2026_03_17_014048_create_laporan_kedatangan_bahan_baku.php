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
        Schema::create('laporan_kedatangan_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_request')->references('id')->on('laporan_permintaan_bahan_baku')->onDelete('cascade');
            $table->foreignId('id_users')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kedatangan_bahan_baku');
    }
};
