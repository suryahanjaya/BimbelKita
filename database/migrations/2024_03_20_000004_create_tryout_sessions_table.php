<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tryout_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('participant_name');
            $table->foreignId('tryout_type_id')->constrained()->onDelete('cascade');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->integer('total_score')->default(0);
            $table->timestamps();
        });

        Schema::create('subtest_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tryout_session_id')->constrained()->onDelete('cascade');
            $table->foreignId('subtest_id')->constrained()->onDelete('cascade');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->integer('score')->default(0);
            $table->timestamps();
        });

        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtest_answer_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('selected_answer', 1)->nullable(); // A, B, C, D, or E
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_answers');
        Schema::dropIfExists('subtest_answers');
        Schema::dropIfExists('tryout_sessions');
    }
}; 