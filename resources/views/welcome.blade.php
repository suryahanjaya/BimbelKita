<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('st.css') }}">

@extends('layouts.app')

@section('content')
  <div class="welcome-banner">
    <img src="{{ asset('images/BANNER.png') }}" alt="Banner BimbelKita">
  </div>

<h4>Materi TryOut</h4>
<div class="slider">
  <div class="slides">
    <a href="http://127.0.0.1:8000/storage/materi/TPS/PU1.pdf" target="_blank">
      <img src="{{ asset('images/PU.png') }}" alt="PU">
    </a>
    <a href="http://127.0.0.1:8000/storage/materi/TPS/PPU1.pdf">
      <img src="{{ asset('images/PPU.png') }}" alt="PPU">
    </a>
    <a href="http://127.0.0.1:8000/storage/materi/TPS/PB2.pdf">
      <img src="{{ asset('images/PBM.png') }}" alt="PBM">
    </a>
    <a href="http://127.0.0.1:8000/storage/materi/TPS/PK1.pdf">
      <img src="{{ asset('images/PK.png') }}" alt="PK">
    </a>
    <a href="http://127.0.0.1:8000/storage/materi/Literasi/BI1.pdf">
      <img src="{{ asset('images/LBI.png') }}" alt="LBI">
    </a>
    <a href="http://127.0.0.1:8000/storage/materi/Literasi/E1.pdf">
      <img src="{{ asset('images/LBING.png') }}" alt="LBING">
    </a> 
    <a href="http://127.0.0.1:8000/storage/materi/Literasi/MTK1.pdf">
      <img src="{{ asset('images/PM.png') }}" alt="PM">
    </a>
  </div>
</div>

<div class="text-center mt-4">
  <a href="{{ route('materi.index') }}" class="btn btn-mulai-belajar">Selengkapnya</a>
</div>

<h2 class="text-center mt-5 mb-4">Pilih fitur yang ingin kamu akses :</h2>
<div class="fitur-container d-flex justify-content-center flex-wrap gap-4">
  <a href="{{ route('materi.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/materi.png') }}" alt="Materi" class="fitur-icon">
    <p>Materi</p>
  </a>
  <a href="{{ route('tryout.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/tryout.png') }}" alt="TryOut" class="fitur-icon">
    <p>TryOut</p>
  </a>
  <a href="{{ route('ptn.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/ptn.png') }}" alt="PTN & Jurusan" class="fitur-icon">
    <p>PTN &<br>Jurusan</p>
  </a>
  <a href="{{ route('banksoal') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/banksoal.png') }}" alt="Bank Soal" class="fitur-icon">
    <p>Bank Soal</p>
  </a>
  <a href="{{ route('forum.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/forum.png') }}" alt="Forum Diskusi" class="fitur-icon">
    <p>Forum Diskusi</p>
  </a>
  <a href="{{ route('live-class.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/liveclass.png') }}" alt="Live Class" class="fitur-icon">
    <p>Live Class</p>
  </a>
  <a href="{{ route('video.pembelajaran') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/video.png') }}" alt="Video Pembelajaran" class="fitur-icon">
    <p>Video<br>Pembelajaran</p>
  </a>
  <a href="{{ route('sertifikat.index') }}" class="fitur-box text-center">
    <img src="{{ asset('images/icons/sertifikat.png') }}" alt="Sertifikat" class="fitur-icon">
    <p>Sertifikat</p>
  </a>
</div>


</div><div class="tryout-banner">
  <a href="{{ route('tryout.index') }}">
    <img src="{{ asset('images/TO.png') }}" alt="TryOut BimbelKita">
  </a>
</div>


<div class="text-center mt-5">
  <a href="{{ route('live-class.index') }}">
    <img src="{{ asset('images/Live.png') }}" alt="Live BimbelKita" class="img-fluid">
  </a>
</div>

@endsection