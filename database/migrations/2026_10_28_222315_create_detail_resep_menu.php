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
        Schema::create('detail_resep_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_menu')->constrained('menu')->onDelete('cascade');
            $table->foreignId('id_inventori')->constrained('inventori')->onDelete('cascade');
            $table->decimal('qty', 10, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_resep_menu');
    }
};
