<style>
  .ea {
    max-width: 700px;
    width: 90%;
    margin: 40px auto;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
    padding: 30px 40px;
    box-sizing: border-box;
  }

  .eb {
    margin-bottom: 20px;
  }

  .ec {
    display: inline-flex;
    align-items: center;
    color: #4a90e2;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: color 0.3s ease;
  }
  .ec:hover {
    color: #2c6bb2;
  }
  .ec i.ed {
    margin-right: 8px;
  }

  .eg h2.eh {
    color: #0a0a0a;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 30px;
  }

  form {
    width: 100%;
  }

  .ei, .em {
    margin-bottom: 25px;
  }

  label.ej, label.en {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
  }

  input.ek, textarea.eo {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    font-family: 'Poppins', sans-serif;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    box-sizing: border-box;
  }

  input.ek:focus, textarea.eo:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    outline: none;
  }

  input.ek.is-invalid, textarea.eo.is-invalid {
    border-color: #e74c3c;
    background-color: #fdecea;
  }

  .el, .ep {
    color: #e74c3c;
    font-size: 13px;
    margin-top: 5px;
    font-weight: 500;
  }

  button.eq {
    background-color: #4a90e2;
    border: none;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-family: 'Poppins', sans-serif;
  }
  button.eq:hover {
    background-color: #2c6bb2;
  }
</style>

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