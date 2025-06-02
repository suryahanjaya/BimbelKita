<?php

namespace App\Http\Controllers;

use App\Models\TryoutType;
use App\Models\TryoutSession;
use App\Models\SubtestAnswer;
use App\Models\PTN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TryoutController extends Controller
{
    public function index()
    {
        // Get only the first instance of each tryout type (by name)
        $tryoutTypes = TryoutType::select('id', 'name', 'code', 'description')
            ->whereIn('id', [1, 2]) // Only get IDs 1 and 2
            ->with(['subtests' => function($query) {
                $query->select('id', 'tryout_type_id', 'name', 'code', 'order')
                      ->orderBy('order');
            }])
            ->get();

        $userSessions = TryoutSession::where('user_id', Auth::id())
            ->with(['tryoutType', 'subtestAnswers'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tryout.index', compact('tryoutTypes', 'userSessions'));
    }

    public function start(Request $request, TryoutType $tryoutType)
    {
        $request->validate([
            'participant_name' => 'required|string|max:255',
        ]);

        $session = TryoutSession::create([
            'user_id' => Auth::id(),
            'participant_name' => $request->participant_name,
            'tryout_type_id' => $tryoutType->id,
            'started_at' => now(),
        ]);

        return redirect()->route('tryout.instructions', $session);
    }

    public function instructions(TryoutSession $session)
    {
        if ($session->isCompleted()) {
            return redirect()->route('tryout.results', $session);
        }

        return view('tryout.instructions', compact('session'));
    }

    public function startSubtest(TryoutSession $session, Request $request)
    {
        if ($session->isCompleted()) {
            return redirect()->route('tryout.results', $session);
        }

        $completedSubtests = $session->subtestAnswers()
            ->where('completed_at', '!=', null)
            ->pluck('subtest_id');

        $nextSubtest = $session->tryoutType->subtests()
            ->whereNotIn('id', $completedSubtests)
            ->orderBy('order')
            ->first();

        if (!$nextSubtest) {
            $session->update(['completed_at' => now()]);
            return redirect()->route('tryout.results', $session);
        }

        $subtestAnswer = SubtestAnswer::create([
            'tryout_session_id' => $session->id,
            'subtest_id' => $nextSubtest->id,
            'started_at' => now(),
        ]);

        return redirect()->route('tryout.subtest', [
            'session' => $session,
            'subtestAnswer' => $subtestAnswer,
        ]);
    }

    public function showSubtest(TryoutSession $session, SubtestAnswer $subtestAnswer)
    {
        if ($session->isCompleted() || $subtestAnswer->isCompleted()) {
            return redirect()->route('tryout.results', $session);
        }

        $questions = $subtestAnswer->subtest->questions()->with('options')->get();
        
        return view('tryout.subtest', compact('session', 'subtestAnswer', 'questions'));
    }

    public function submitSubtest(TryoutSession $session, SubtestAnswer $subtestAnswer, Request $request)
    {
        if ($session->isCompleted() || $subtestAnswer->isCompleted()) {
            return redirect()->route('tryout.results', $session);
        }

        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|in:A,B,C,D,E',
        ]);

        $score = 0;
        foreach ($request->answers as $questionId => $answer) {
            $question = $subtestAnswer->subtest->questions()->find($questionId);
            $isCorrect = $question->correct_answer === $answer;
            
            if ($isCorrect) {
                $score++;
            }

            $subtestAnswer->questionAnswers()->create([
                'question_id' => $questionId,
                'selected_answer' => $answer,
                'is_correct' => $isCorrect,
            ]);
        }

        $subtestAnswer->update([
            'completed_at' => now(),
            'score' => $score,
        ]);

        // Update total score
        $totalScore = $session->subtestAnswers()->sum('score');
        $session->update(['total_score' => $totalScore]);

        // Check for next subtest and create it immediately
        $completedSubtests = $session->subtestAnswers()
            ->where('completed_at', '!=', null)
            ->pluck('subtest_id');

        $nextSubtest = $session->tryoutType->subtests()
            ->whereNotIn('id', $completedSubtests)
            ->orderBy('order')
            ->first();

        if (!$nextSubtest) {
            $session->update(['completed_at' => now()]);
            return redirect()->route('tryout.results', $session);
        }

        $nextSubtestAnswer = SubtestAnswer::create([
            'tryout_session_id' => $session->id,
            'subtest_id' => $nextSubtest->id,
            'started_at' => now(),
        ]);

        return redirect()->route('tryout.subtest', [
            'session' => $session,
            'subtestAnswer' => $nextSubtestAnswer,
        ]);
    }

    public function results(TryoutSession $session)
    {
        if (!$session->isCompleted()) {
            return redirect()->route('tryout.start-subtest', $session);
        }

        $leaderboard = TryoutSession::where('tryout_type_id', $session->tryout_type_id)
            ->where('completed_at', '!=', null)
            ->orderByDesc('total_score')
            ->orderBy('completed_at')
            ->limit(10)
            ->get();

        return view('tryout.results', compact('session', 'leaderboard'));
    }
} 