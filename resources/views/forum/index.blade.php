@extends('layouts.app')

@section('content')
<div class="ia">
    <div class="ib">
        <h2>Forum Diskusi</h2>
        @auth
            <a href="{{ route('forum.create') }}" class="ic">
                <i class="id"></i> Buat Pertanyaan
            </a>
        @endauth
    </div>

    @if(session('success'))
        <div class="ie">
            {{ session('success') }}
        </div>
    @endif

    <div class="if">
        <div class="ig">
            @if($topics->count())
                <div class="ih">
                    @foreach($topics as $topic)
                        <div class="ii">
                            <div class="ij">
                                <h5 class="ik">
                                    <a href="{{ route('forum.show', $topic) }}" class="il">
                                        {{ $topic->title }}
                                    </a>
                                </h5>
                                <small class="im">
                                    {{ $topic->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <div class="in">
                                <div>
                                    <small class="text-muted">
                                        Oleh : {{ $topic->user->username }} |
                                        <i class="io"></i> {{ $topic->views }} views |
                                        <i class="ip"></i> {{ $topic->comments_count }} komentar
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="iq">
                    {{ $topics->links() }}
                </div>
            @else
                <p class="is">Belum ada diskusi. 
                    @auth
                        <a href="{{ route('forum.create') }}">Mulai diskusi pertama!</a>
                    @else
                        <a href="{{ route('login') }}">Login</a> untuk mulai diskusi!
                    @endauth
                </p>
            @endif
        </div>
    </div>
</div>
@endsection 