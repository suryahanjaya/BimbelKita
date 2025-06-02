<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="ea">
    <div class="eb">
        <a href="{{ route('forum.show', $topic) }}" class="ec">
            <i class="ed"></i> Kembali ke Diskusi
        </a>
    </div>

    <div class="ef">
        <div class="eg">
            <h2 class="eh">Edit Pertanyaan</h2>

            <form action="{{ route('forum.update', $topic) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="ei">
                    <label for="title" class="ej">Judul Pertanyaan</label>
                    <input type="text" class="ek @error('title') is-invalid @enderror" 
                        id="title" name="title" value="{{ old('title', $topic->title) }}" 
                        placeholder="Masukkan judul pertanyaan">
                    @error('title')
                        <div class="el">{{ $message }}</div>
                    @enderror
                </div>

                <div class="em">
                    <label for="content" class="en">Isi Pertanyaan</label>
                    <textarea class="eo @error('content') is-invalid @enderror" 
                        id="content" name="content" rows="5" 
                        placeholder="Jelaskan pertanyaan Anda secara detail...">{{ old('content', $topic->content) }}</textarea>
                    @error('content')
                        <div class="ep">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="eq">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection 