<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subkategori_materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_materi_id')->constrained('kategori_materis')->onDelete('cascade');
            $table->string('nama_subkategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subkategori_materis');
    }
};
