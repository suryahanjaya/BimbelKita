<style>

.za {
    max-width: 900px;
    margin: auto;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
    background-color: #fff;
    border-radius: 10px;
}

.zb {
    margin-bottom: 20px;
}

.zc {
    color: #3490dc;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
}

.zc:hover {
    text-decoration: underline;
}

/* Notifikasi */
.ze {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 12px 15px;
    border-radius: 5px;
    color: #155724;
    margin-bottom: 15px;
}

/* Judul Topik */
.zg {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
}

.zh {
    display: flex;
    justify-content: space-between;
    align-items: start;
    gap: 10px;
}

.zi {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
}

.zj {
    position: relative;
    display: inline-block;
}

.zk {
    background: #007bff;
    border: none;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
}

.zm {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 120px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    border-radius: 4px;
    z-index: 1000;
    margin-top: 5px;
    padding: 5px 0;
    list-style: none;
}

.zm li {
    padding: 8px 16px;
}

.zm li a, .zm li button {
    color: #333;
    text-decoration: none;
    display: block;
    width: 100%;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
    font-size: 14px;
}

/* Show dropdown on hover */
.zj:hover .zm {
    display: block;
}

.zm li:hover {
    background-color: #f1f1f1;
}


.zn, .zq {
    display: block;
    padding: 8px 15px;
    color: #333;
    text-decoration: none;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
}

.zq {
    background: none;
    cursor: pointer;
}

.zn:hover, .zq:hover {
    background-color: #f0f0f0;
}

/* Info Topik */
.zs {
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 20px;
}

.zv {
    font-size: 16px;
    margin-bottom: 20px;
    line-height: 1.6;
}

/* Komentar */
.zx {
    margin-top: 30px;
    margin-bottom: 15px;
    font-weight: bold;
}

.zy {
    margin-bottom: 20px;
}

.zz {
    margin-bottom: 10px;
}

.zaa {
    width: 100%;
    padding: 10px;
    font-size: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    resize: vertical;
}

.zab {
    color: red;
    font-size: 13px;
    margin-top: 5px;
}

.zac {
    background-color: #3490dc;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
}

.zac:hover {
    background-color: #2779bd;
}

.zad {
    font-size: 14px;
}

.zad a {
    color: #3490dc;
    font-weight: bold;
}

.zae {
    margin-top: 25px;
}

.zaf {
    margin-bottom: 25px;
    border-left: 3px solid #3490dc;
    padding-left: 15px;
    padding-bottom: 10px;
}

.zaj {
    font-size: 14px;
    color: #6c757d;
}

.zak {
    font-size: 15px;
    margin: 5px 0;
}

.zal {
    margin-top: 8px;
}

.zal .btn {
    font-size: 13px;
    color: #555;
}

.zan form {
    margin-top: 10px;
}

.zap {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.zaq {
    background-color: #38c172;
    color: white;
    padding: 6px 14px;
    border: none;
    border-radius: 6px;
    margin-top: 5px;
    font-size: 14px;
}

.zaq:hover {
    background-color: #2d995b;
}

.zas {
    margin-left: 25px;
    margin-top: 10px;
    border-left: 2px dashed #ccc;
    padding-left: 15px;
}

.zaw {
    font-size: 13px;
    color: #888;
}

.zax {
    font-size: 14px;
    margin-top: 3px;
    line-height: 1.5;
}

@media (max-width: 600px) {
    .zh {
        flex-direction: column;
        align-items: flex-start;
    }

    .zm {
        right: auto;
        left: 0;
    }

    .zaq, .zac {
        width: 100%;
        text-align: center;
    }
}
</style>

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
        const replyForm = $(#reply-form-${commentId});
        
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