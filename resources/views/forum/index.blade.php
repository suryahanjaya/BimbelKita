<style>
  .ia {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Poppins', sans-serif;
  }

  .ib {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
  }

  .ib h2 {
    font-weight: 700;
    font-size: 28px;
    color: #0a0a0a;
  }

  .ic {
    display: inline-flex;
    align-items: center;
    background-color: #4a90e2;
    color: #fff;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  .ic:hover {
    background-color: #2c6bb2;
  }
  .ic i.id {
    margin-right: 8px;
  }

  .ie {
    background-color: #d4edda;
    color: #155724;
    padding: 12px 20px;
    border-radius: 6px;
    margin-bottom: 25px;
    border: 1px solid #c3e6cb;
  }

  .if {
    background: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
    padding: 25px 30px;
  }

  .ig {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }

  .ih {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .ii {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
  }

  .ij {
    margin-bottom: 8px;
  }

  .ik a.il {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  .ik a.il:hover {
    color: #4a90e2;
  }

  .im {
    font-size: 12px;
    color: #888;
  }

  .in small.text-muted {
    font-size: 13px;
    color: #666;
  }

  .in i.io, .in i.ip {
    margin-right: 4px;
    color: #999;
  }

  .iq {
    margin-top: 20px;
    display: flex;
    justify-content: center;
  }

  .is {
    font-size: 16px;
    color: #555;
    text-align: center;
  }

  .is a {
    color: #4a90e2;
    text-decoration: none;
    font-weight: 600;
  }
  .is a:hover {
    text-decoration: underline;
  }
</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

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