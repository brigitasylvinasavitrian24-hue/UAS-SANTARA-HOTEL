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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique(); // Nomor/Nama Kamar
            $table->string('type');                  // Tipe Kamar (Deluxe, Standard, dll)
            $table->integer('price');                // Harga per malam
            $table->string('image')->nullable();     // Foto kamar (boleh kosong dulu)
            $table->boolean('is_available')->default(true); // Status ketersediaan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};