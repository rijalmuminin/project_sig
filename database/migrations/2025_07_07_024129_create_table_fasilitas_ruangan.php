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
        Schema::create('fasilitas_ruangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilitas_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->timestamps();

            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->onDelete('cascade'); 
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_ruangan');
    }
};
