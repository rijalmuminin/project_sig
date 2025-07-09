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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->unsignedBigInteger('kategori_id');
            $table->text('deskripsi')->nullable();
            $table->string('gambar');
            $table->unsignedBigInteger('lantai_id');
            $table->timestamps();

            $table->foreign('lantai_id')->references('id')->on('lantais')->onDelete('cascade'); 
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
