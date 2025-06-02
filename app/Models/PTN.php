<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTN extends Model
{
    use HasFactory;

    protected $table = 'ptns';

    protected $fillable = [
        'name',
        'code',
        'min_score',
        'description',
    ];

    public static function getRecommendations($totalScore)
    {
        return self::where('min_score', '<=', $totalScore)
            ->orderByDesc('min_score')
            ->get();
    }
} 