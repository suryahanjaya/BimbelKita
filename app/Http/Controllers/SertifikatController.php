<?php

namespace App\Http\Controllers;

use App\Models\TryoutSession;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SertifikatController extends Controller
{
    public function index()
    {
        // Get latest TPS score
        $latestTps = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'TPS');
            })
            ->orderBy('completed_at', 'desc')
            ->first();

        // Get latest Literasi score
        $latestLiterasi = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'LITERASI');
            })
            ->orderBy('completed_at', 'desc')
            ->first();

        return view('sertifikat.index', compact('latestTps', 'latestLiterasi'));
    }

    public function generate()
    {
        // Get latest TPS score
        $latestTps = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'TPS');
            })
            ->with(['subtestAnswers.subtest'])  // Eager load subtest relationships
            ->orderBy('completed_at', 'desc')
            ->first();

        // Get latest Literasi score
        $latestLiterasi = TryoutSession::where('user_id', Auth::id())
            ->whereHas('tryoutType', function($query) {
                $query->where('code', 'LITERASI');
            })
            ->with(['subtestAnswers.subtest'])  // Eager load subtest relationships
            ->orderBy('completed_at', 'desc')
            ->first();

        // Calculate total score
        $totalScore = ($latestTps ? $latestTps->total_score : 0) + ($latestLiterasi ? $latestLiterasi->total_score : 0);

        // Get current date in Indonesian format
        $currentDate = Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        $data = [
            'user' => Auth::user(),
            'tps' => $latestTps,
            'literasi' => $latestLiterasi,
            'totalScore' => $totalScore,
            'date' => $currentDate
        ];

        $pdf = PDF::loadView('sertifikat.template', $data);
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download('sertifikat-tryout-' . Auth::user()->name . '.pdf');
    }
} 