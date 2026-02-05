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
        Schema::create('inventori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->foreignId('id_kategori');
            $table->integer('stock')->nullable();
            $table->integer('average_daily_usage')->nullable();
            $table->integer('lead_time')->nullable();
            $table->integer('safety_stock')->nullable();
            $table->integer('reorder_point')->nullable();
            $table->foreignId('id_uom');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('id_uom')->references('id')->on('unit_of_measurement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventori');
    }
};
