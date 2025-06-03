<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

body {
  font-family: 'Poppins', sans-serif;
  color: #555;
  line-height: 1.5;
}

h2 {
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  font-size: 2.2rem;
  margin-bottom: 1.5rem;
  color: #2c3e50;
  text-shadow: 0.5px 0 rgba(0,0,0,0.1);
}


form .form-select {
  border: 1px solid #ccc;
  border-radius: 6px;
  padding: 8px 12px;
  font-size: 1rem;
  transition: border-color 0.3s ease;
  font-family: 'Poppins', sans-serif;
}

form .form-select:focus {
  border-color: #4a90e2;
  outline: none;
  box-shadow: 0 0 6px rgba(74, 144, 226, 0.3);
}

.mb-3 {
  margin-bottom: 1.5rem !important;
}

.list-group {
  background: #fff;
  border-radius: 8px;
  padding: 0;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
  list-style-type: none;
}

.list-group-item {
  padding: 2rem 2.5rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  margin-bottom: 1rem;
  background-color: #fff;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.05);
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.list-group-item:last-child {
  border-bottom: none;
}

.list-group-item h5 {
  font-weight: 600;
  color: #34495e;
  margin-bottom: 0.5rem;
}

.materi-img {
  display: block;
  margin: 0 auto 12px auto;
  width: 100%;
  max-width: 250px;
  height: 140px;
  object-fit: contain;
  border-radius: 6px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}


.materi-card {
  padding: 1.5rem 2rem;
  border: 1px solid #ddd;
  border-radius: 10px;
  margin-bottom: 1.5rem;
  background-color: #fff;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);

  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

p {
  color: #555;
  line-height: 1.5;
  margin-bottom: 1rem;
}

.text-start {
  text-align: left;
}

.btn {
  font-size: 0.9rem;
  padding: 6px 14px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  text-decoration: none;
}

.btn-primary {
  background-color: #5a6ea0;
  border: none;
  color: white;
}

.btn-primary:hover {
  background-color: #475982;
}

.btn-info {
  background-color: #4aa3df;
  border: none;
  color: white;
}

.btn-info:hover {
  background-color: #3684c6;
}

.btn-secondary {
  background-color: #7a7a7a;
  border: none;
  color: white;
}

.btn-secondary:hover {
  background-color: #5c5c5c;
}

.me-2 {
  margin-right: 0.5rem !important;
}

.mt-2 {
  margin-top: 0.5rem !important;
}

.mt-3 {
  margin-top: 1rem !important;
}
</style>

@extends('layouts.app')

@section('content')
<h2><b>Daftar Materi UTBK</b></h2>
{{-- Form filter kategori dan subkategori --}}
<form method="GET" action="{{ route('materi.index') }}" class="mb-3">
  <div class="row g-2">
    <div class="col-md-4">
      {{-- Dropdown kategori --}}
      <select name="kategori" class="form-select" onchange="this.form.submit()">
        <option value="">Pilih Kategori</option>
        @foreach ($kategoriMateris as $kategori)
          <option value="{{ $kategori->id }}" {{ (request('kategori') == $kategori->id) ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-md-4">
      {{-- Dropdown subkategori --}}
      <select name="subkategori" class="form-select" onchange="this.form.submit()">
        <option value="">Pilih Subkategori</option>
        @if ($kategoriId)
          @foreach ($kategoriMateris->where('id', $kategoriId)->first()->subkategoriMateris as $subkategori)
            <option value="{{ $subkategori->id }}" {{ (request('subkategori') == $subkategori->id) ? 'selected' : '' }}>
              {{ $subkategori->nama_subkategori }}
            </option>
          @endforeach
        @endif
      </select>
    </div>
  </div>

  {{-- Tombol reset --}}
  <div class="mt-2">
    <a href="{{ route('materi.index') }}" class="btn btn-secondary btn-sm">Reset Filter</a>
  </div>
</form>

{{-- Cek apakah ada materi --}}
@if($materis->count())
  <div class="row">
    @foreach($materis as $materi)
      <div class="col-md-6 mb-3">
        <div class="materi-card">
          <h5>{{ $materi->judul }}</h5>

          {{-- Gambar sesuai ID materi --}}
          @switch($materi->id)
            @case(8)
                <img src="{{ asset('images/PU.png') }}" alt="PU" class="materi-img mb-2">
                @break
            @case(9)
                <img src="{{ asset('images/PU1.png') }}" alt="LBI1" class="materi-img mb-2">
                @break
            @case(10)
                <img src="{{ asset('images/PPU.png') }}" alt="LBING" class="materi-img mb-2">
                @break
            @case(11)
                <img src="{{ asset('images/PPU1.png') }}" alt="LBING1" class="materi-img mb-2">
                @break
            @case(12)
                <img src="{{ asset('images/PBM.png') }}" alt="PBM" class="materi-img mb-2">
                @break
            @case(13)
                <img src="{{ asset('images/PBM1.png') }}" alt="PBM1" class="materi-img mb-2">
                @break
            @case(14)
                <img src="{{ asset('images/PK.png') }}" alt="PK" class="materi-img mb-2">
                @break
            @case(15)
                <img src="{{ asset('images/PK1.png') }}" alt="PK1" class="materi-img mb-2">
                @break
            @case(16)
                <img src="{{ asset('images/LBI.png') }}" alt="PM" class="materi-img mb-2">
                @break
            @case(17)
                <img src="{{ asset('images/LBI1.png') }}" alt="PM1" class="materi-img mb-2">
                @break
            @case(18)
                <img src="{{ asset('images/LBING.png') }}" alt="PPU1" class="materi-img mb-2">
                @break
            @case(19)
                <img src="{{ asset('images/LBING1.png') }}" alt="PU" class="materi-img mb-2">
                @break
            @case(20)
                <img src="{{ asset('images/PM.png') }}" alt="PU1" class="materi-img mb-2">
                @break
            @default
                <img src="{{ asset('images/PM1.png') }}" alt="Default" class="materi-img mb-2">
          @endswitch

          <p>{{ $materi->deskripsi }}</p>

          <div class="text-start mt-2">
            {{-- Tombol download --}}
            @if ($materi->file_path)
              <a href="{{ asset('images/' . $materi->file_path) }}" class="btn btn-sm btn-primary me-2" download>
                Download PDF
              </a>
            @endif

            {{-- Tombol lihat detail --}}
            <a href="{{ asset('images/' . $materi->file_path) }}" target="_blank" class="btn btn-sm btn-info">
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@else
  <p>Tidak ada materi ditemukan.</p>
@endif

<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
@endsection