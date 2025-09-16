<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('kas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('siswa_id');
        $table->date('tanggal');
        $table->integer('jumlah');
        $table->string('keterangan')->nullable();
        $table->timestamps();

        // Relasi ke tabel siswa//
        $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
