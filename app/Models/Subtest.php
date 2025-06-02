<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subtest extends Model
{
    protected $fillable = [
        'tryout_type_id',
        'name',
        'code',
        'duration',
        'question_count',
        'order',
    ];

    public function tryoutType(): BelongsTo
    {
        return $this->belongsTo(TryoutType::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(SubtestAnswer::class);
    }
} 