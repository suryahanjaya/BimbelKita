<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubtestAnswer extends Model
{
    protected $fillable = [
        'tryout_session_id',
        'subtest_id',
        'started_at',
        'completed_at',
        'score',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function tryoutSession(): BelongsTo
    {
        return $this->belongsTo(TryoutSession::class);
    }

    public function subtest(): BelongsTo
    {
        return $this->belongsTo(Subtest::class);
    }

    public function questionAnswers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function isCompleted(): bool
    {
        return !is_null($this->completed_at);
    }
} 