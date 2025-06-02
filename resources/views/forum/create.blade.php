<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="fa">
    <div class="fb">
        <a href="{{ route('forum.index') }}" class="fc">
            <i class="fd"></i> Kembali ke Forum
        </a>
    </div>

    <div class="fe">
        <div class="ff">
            <h2 class="fg">Buat Pertanyaan Baru</h2>

            <form action="{{ route('forum.store') }}" method="POST">
                @csrf

                <div class="fh">
                    <label for="title" class="fi">Judul Pertanyaan</label>
                    <input type="text" class="fj @error('title') is-invalid @enderror" 
                        id="title" name="title" value="{{ old('title') }}" 
                        placeholder="Masukkan judul pertanyaan">
                    @error('title')
                        <div class="fk">{{ $message }}</div>
                    @enderror
                </div>

                <div class="fl">
                    <label for="content" class="fm">Isi Pertanyaan</label>
                    <textarea class="fn @error('content') is-invalid @enderror" 
                        id="content" name="content" rows="5" 
                        placeholder="Jelaskan pertanyaan Anda secara detail...">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="fo">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
            </form>
        </div>
    </div>
</div>
@endsection 