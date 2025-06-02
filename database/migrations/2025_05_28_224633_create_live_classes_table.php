<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pengajar');
            $table->string('hari')->nullable(); // opsional
            $table->date('tanggal');
            $table->time('mulai');
            $table->time('selesai');
            $table->string('link_gmeet')->nullable();
            $table->string('foto')->nullable(); // path ke gambar (public/storage)
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
