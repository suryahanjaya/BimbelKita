<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionAnswer extends Model
{
    protected $fillable = [
        'subtest_answer_id',
        'question_id',
        'selected_answer',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function subtestAnswer(): BelongsTo
    {
        return $this->belongsTo(SubtestAnswer::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
} 