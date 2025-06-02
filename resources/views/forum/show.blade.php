@extends('layouts.app')

@section('content')
<div class="za">
    <div class="zb">
        <a href="{{ route('forum.index') }}" class="zc">
            <i class="zd"></i> Kembali ke Forum
        </a>
    </div>

    @if(session('success'))
        <div class="ze">
            {{ session('success') }}
        </div>
    @endif

    <div class="zf">
        <div class="zg">
            <div class="zh">
                <h2 class="zi">{{ $topic->title }}</h2>
                @can('update', $topic)
                    <div class="zj">
                        <button class="zk" type="button" data-bs-toggle="dropdown">
                            <i class="zl"></i>
                        </button>
                        <ul class="zm">
                            <li>
                                <a class="zn" href="{{ route('forum.edit', $topic) }}">
                                    <i class="zo"></i> Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('forum.delete', $topic) }}" method="POST" class="zp">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="zq" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="zr"></i> Hapus
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endcan
            </div>

            <div class="zs">
                <small class="zt">
                    Oleh: {{ $topic->user->username }} |
                    {{ $topic->created_at->diffForHumans() }} |
                    <i class="zu"></i> {{ $topic->views }} views
                </small>
            </div>

            <div class="zv">
                {!! nl2br(e($topic->content)) !!}
            </div>

            <hr>

            <h4 class="zx">Komentar ({{ $topic->comments->count() }})</h4>

            @auth
                <form action="{{ route('forum.comments.store', $topic) }}" method="POST" class="zy">
                    @csrf
                    <div class="zz">
                        <textarea name="content" class="zaa @error('content') is-invalid @enderror" 
                            rows="3" placeholder="Tulis komentar...">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="zab">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="zac">Kirim Komentar</button>
                </form>
            @else
                <div class="zad">
                    <a href="{{ route('login') }}">Login</a> untuk menambahkan komentar.
                </div>
            @endauth

            <div class="zae">
                @foreach($topic->rootComments as $comment)
                    <div class="zaf">
                        <div class="zag">
                            <div class="zah">
                                <div class="zai">
                                    <small class="zaj">
                                        {{ $comment->user->username }} • {{ $comment->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="zak">
                                    {!! nl2br(e($comment->content)) !!}
                                </div>

                                @auth
                                    <div class="zal">
                                        <button class="btn btn-sm btn-light reply-toggle" 
                                            data-comment-id="{{ $comment->id }}">
                                            <i class="zam"></i> Balas
                                        </button>
                                    </div>

                                    <div class="zan" id="reply-form-{{ $comment->id }}" style="display: none;">
                                        <form action="{{ route('forum.comments.store', $topic) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <div class="zao">
                                                <textarea name="content" class="zap" rows="2" 
                                                    placeholder="Tulis balasan..."></textarea>
                                            </div>
                                            <button type="submit" class="zaq">Kirim Balasan</button>
                                        </form>
                                    </div>
                                @endauth

                                @if($comment->replies->count() > 0)
                                    <div class="zas">
                                        @foreach($comment->replies as $reply)
                                            <div class="zat">
                                                <div class="zau">
                                                    <div class="zav">
                                                        <small class="zaw">
                                                            {{ $reply->user->username }} • {{ $reply->created_at->diffForHumans() }}
                                                        </small>
                                                        <div class="zax">
                                                            {!! nl2br(e($reply->content)) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Handle reply button clicks
    $('.reply-toggle').click(function(e) {
        e.preventDefault();
        const commentId = $(this).data('comment-id');
        const replyForm = $(`#reply-form-${commentId}`);
        
        // Hide all other reply forms
        $('.reply-form').not(replyForm).slideUp();
        
        // Toggle this reply form
        replyForm.slideToggle();
        
        // Focus on textarea if showing form
        if (replyForm.is(':visible')) {
            replyForm.find('textarea').focus();
        }
    });

    // Handle Escape key
    $(document).keydown(function(e) {
        if (e.key === 'Escape') {
            $('.reply-form').slideUp();
        }
    });
});
</script>
@endpush

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
.reply-form {
    display: none;
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-top: 10px;
}

.reply-toggle {
    transition: all 0.2s ease;
}

.reply-toggle:hover {
    background-color: #e9ecef;
}
</style>
@endsection

@endsection 