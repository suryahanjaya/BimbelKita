<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Poppins', sans-serif;
  }
</style>

@extends('layouts.app')

@section('content')
<h2>Daftar Materi UTBK</h2>

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
  <ul class="list-group">
    @foreach($materis as $materi)
      <li class="list-group-item">
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
         <a href="{{ asset('storage/' . $materi->file_path) }}" class="btn btn-sm btn-primary me-2" download>
          Download PDF
          </a>
          @endif

         {{-- Tombol lihat detail --}}
          <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="btn btn-sm btn-info">
          Lihat Detail
          </a>
        </div>
        
      </li>
    @endforeach
  </ul>
@else
  <p>Tidak ada materi ditemukan.</p>
@endif

<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
@endsection
