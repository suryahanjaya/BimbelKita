<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use App\Models\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

#[\Illuminate\Routing\Middleware\SubstituteBindings]
class ForumController extends Controller
{
    use AuthorizesRequests;

    #[\Illuminate\Routing\Controllers\Middleware('auth', except: ['index', 'show'])]
    public function __construct()
    {
    }

    public function index()
    {
        $topics = ForumTopic::with('user')
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('forum.index', compact('topics'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10'
        ]);

        $topic = Auth::user()->forumTopics()->create($validated);

        return redirect()->route('forum.show', $topic)
            ->with('success', 'Pertanyaan berhasil dibuat!');
    }

    public function show(ForumTopic $topic)
    {
        // Increment view count
        $topic->increment('views');

        $topic->load(['user', 'rootComments.user', 'rootComments.replies.user']);

        return view('forum.show', compact('topic'));
    }

    public function storeComment(Request $request, ForumTopic $topic)
    {
        $validated = $request->validate([
            'content' => 'required|min:2',
            'parent_id' => 'nullable|exists:forum_comments,id'
        ]);

        $comment = new ForumComment($validated);
        $comment->user_id = Auth::id();
        $comment->topic_id = $topic->id;
        $comment->save();

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function edit(ForumTopic $topic)
    {
        $this->authorize('update', $topic);
        return view('forum.edit', compact('topic'));
    }

    public function update(Request $request, ForumTopic $topic)
    {
        $this->authorize('update', $topic);
        
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:10'
        ]);

        $topic->update($validated);

        return redirect()->route('forum.show', $topic)
            ->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function destroy(ForumTopic $topic)
    {
        $this->authorize('delete', $topic);
        
        $topic->delete();

        return redirect()->route('forum.index')
            ->with('success', 'Pertanyaan berhasil dihapus!');
    }
} 