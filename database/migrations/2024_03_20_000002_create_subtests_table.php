<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subtests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tryout_type_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('code');
            $table->integer('duration')->default(15); // in minutes
            $table->integer('question_count')->default(5);
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtests');
    }
}; 