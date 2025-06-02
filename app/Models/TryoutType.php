<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TryoutType extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        // Always order by ID to ensure consistent ordering
        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('id');
        });
    }

    public function subtests(): HasMany
    {
        return $this->hasMany(Subtest::class)->orderBy('order');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(TryoutSession::class);
    }

    // Ensure we get unique records
    public static function getUnique()
    {
        return static::select('id', 'name', 'code', 'description')
            ->distinct()
            ->with(['subtests' => function($query) {
                $query->select('id', 'tryout_type_id', 'name', 'code', 'order')
                      ->orderBy('order');
            }])
            ->get();
    }
} 