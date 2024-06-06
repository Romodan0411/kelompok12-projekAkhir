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
        Schema::create('buku_has_kategori_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("buku_id");
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->unsignedBigInteger("kategori_buku_id");
            $table->foreign('kategori_buku_id')->references('id')->on('kategori_buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_has_kategori_buku');
    }
};
