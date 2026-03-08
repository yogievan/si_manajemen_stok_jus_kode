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
        Schema::create('laporan_permintaan_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tgl_request')->nullable();
            $table->string('keterangan_manager')->nullable();
            $table->string('status_finance')->nullable();
            $table->string('keterangan_finance')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_permintaan_bahan_baku');
    }
};
