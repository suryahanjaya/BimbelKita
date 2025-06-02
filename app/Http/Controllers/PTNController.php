<?php

namespace App\Http\Controllers;

use App\Models\PTN;
use App\Models\TryoutSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PTNController extends Controller
{
    public function index()
    {
        // Get highest score from TPS tryout
        $highestTpsScore = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'TPS');
            })
            ->max('total_score');

        // Get highest score from Literasi tryout
        $highestLiterasiScore = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'LITERASI');
            })
            ->max('total_score');

        // Calculate total highest score
        $totalHighestScore = ($highestTpsScore ?? 0) + ($highestLiterasiScore ?? 0);

        // Get PTN recommendations
        $ptnRecommendations = PTN::where('min_score', '<=', $totalHighestScore)
            ->orderByDesc('min_score')
            ->get();

        // General advice for low scores
        $generalAdvice = $totalHighestScore <= 25 
            ? "Perlu latihan lebih lanjut sebelum memilih PTN target. Tetap semangat!"
            : null;

        // Get user's tryout history
        $tpsHistory = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'TPS');
            })
            ->orderByDesc('total_score')
            ->get();

        $literasiHistory = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'LITERASI');
            })
            ->orderByDesc('total_score')
            ->get();

        return view('ptn.index', compact(
            'ptnRecommendations', 
            'generalAdvice', 
            'highestTpsScore',
            'highestLiterasiScore',
            'totalHighestScore',
            'tpsHistory',
            'literasiHistory'
        ));
    }
} 