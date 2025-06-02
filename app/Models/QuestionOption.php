<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    protected $fillable = [
        'question_id',
        'option_label',
        'option_text',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
} 