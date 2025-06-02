<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtest_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->string('correct_answer', 1); // A, B, C, D, or E
            $table->integer('order');
            $table->timestamps();
        });

        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('option_label', 1); // A, B, C, D, or E
            $table->text('option_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_options');
        Schema::dropIfExists('questions');
    }
}; 