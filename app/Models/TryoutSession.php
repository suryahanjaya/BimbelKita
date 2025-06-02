<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TryoutSession extends Model
{
    protected $fillable = [
        'user_id',
        'participant_name',
        'tryout_type_id',
        'started_at',
        'completed_at',
        'total_score',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tryoutType(): BelongsTo
    {
        return $this->belongsTo(TryoutType::class);
    }

    public function subtestAnswers(): HasMany
    {
        return $this->hasMany(SubtestAnswer::class);
    }

    public function isCompleted(): bool
    {
        return !is_null($this->completed_at);
    }
} 