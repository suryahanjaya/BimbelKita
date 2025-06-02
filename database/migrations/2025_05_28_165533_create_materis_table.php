<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subkategori_materi_id')->constrained('subkategori_materis')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->longText('isi'); // Bisa untuk teks panjang atau konten html
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materis');
    }
};
