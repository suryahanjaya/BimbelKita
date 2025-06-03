@extends('layouts.app')

@section('content')
<style>

 .fa, 
.fa input, 
.fa textarea, 
.fa button {
  font-family: 'Poppins', sans-serif !important;
}

.fa {
  max-width: 700px;     
  width: 90%;          
  margin: 40px auto;      
  background: #fff;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  padding: 30px 40px;
  box-sizing: border-box; 
}

  .fb {
    margin-bottom: 20px;
  }

  .fc {
    display: inline-flex;
    align-items: center;
    color: #4a90e2;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: color 0.3s ease;
  }
  .fc:hover {
    color: #2c6bb2;
  }

  .fc i.fd {
    margin-right: 8px;
  }

  .ff h2.fg {
    color: #0a0a0a;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 30px;
  }

  form {
    width: 100%;
  }

  .fh, .fl {
    margin-bottom: 25px;
  }

  label.fi, label.fm {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
  }

  input.fj, textarea.fn {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    font-family: 'Poppins', sans-serif;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input.fj:focus, textarea.fn:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    outline: none;
  }

  input.fj.is-invalid, textarea.fn.is-invalid {
    border-color: #e74c3c;
    background-color: #fdecea;
  }

  .fk, .fo {
    color: #e74c3c;
    font-size: 13px;
    margin-top: 5px;
    font-weight: 500;
  }

  button.btn-primary {
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
  button.btn-primary:hover {
    background-color: #2c6bb2;
  }
</style>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"> 
 
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