<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body {
  font-family: 'Poppins', sans-serif;
}

/* Teks dan Judul */
.text-center.mt-4, h4, h2 {
  font-family: 'Poppins', sans-serif;
}

h4 {
  font-weight: 600;
  margin-top: 30px;
  margin-bottom: 20px;
  text-align: left;
}

h2 {
  font-weight: 600;
  margin-bottom: 1.5rem;
  color: #1f6eff;
}

/* BANNER DI HOME */
.welcome-banner {
  padding: 0;
  margin-bottom: 2rem;
}

.welcome-banner img {
  width: 130%;
  height: auto;
  display: block;
  margin-left: -192px;
  margin-top: -22px;
}

/* SLIDER MATERI */
.slider {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none;
  -ms-overflow-style: none;
  padding: 20px 0;
}
.slider::-webkit-scrollbar {
  display: none;
}
.slides {
  white-space: nowrap;
}
.slides a {
  display: inline-block;
  margin: 0 10px;
}
.slides img {
  height: 150px;
  border-radius: 8px;
  transition: transform 0.3s;
}
.slides img:hover {
  transform: scale(1.05);
}

/* Tombol Mulai Belajar */
.btn-mulai-belajar {
  background-color: #f57f17;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  transition: background-color 0.3s ease;
  margin-right: -1150px;
  margin-top: -240px;
}
.btn-mulai-belajar:hover {
  background-color: #155bd5;
  border-color: #155bd5;
}

/* FITUR */
.fitur-container {
  background-color: #f5f9ff;
  border: 2px solid #4286eb;
  border-radius: 20px;
  padding: 30px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
}
.fitur-box {
  /* background-color: #ffffff; */
  /* padding: 15px; */
  /* border-radius: 12px; */
  width: 100px;
  text-decoration: none;
  color: #333;
  margin: 15px;
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
}
.fitur-box:hover {
  transform: translateY(-5px);
}

.fitur-icon {
  width: 80px;
  height: 80px;
  margin-bottom: 25px;
  transition: transform 0.2s ease, filter 0.2s ease;
  text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.fitur-box:hover .fitur-icon {
  transform: scale(1.1);
  filter: brightness(1.1);
}
.fitur-box:active .fitur-icon {
  transform: scale(0.95);
  filter: brightness(0.95);
}
.fitur-box p {
  font-size: 18px;
  font-weight: 500;
  color: #000000;
  line-height: 1.2;
}

/* TRYOUT BANNER */
.tryout-banner {
  margin: 60px 0;
  display: flex;
  justify-content: center;
}
.tryout-banner img {
  width: 100%;
  max-width: 2000px;
  border-radius: 10px;
  margin-top: 40px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.tryout-banner img:hover {
  transform: scale(1.03);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* LIVE CLASS SECTION */
.text-center.mt-5 {
  margin-top: 60px;
  margin-bottom: 40px;
  display: flex;
  justify-content: center;
}
.img-fluid {
  max-width: 150%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
}

/* NAVBAR */
.custom-navbar {
  background-color: #ffffff;
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.1);
  padding: 0.5rem 1rem;
  position: sticky;
  top: 0;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}
.logo {
  height: 40px;
}
.navbar-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  flex-wrap: wrap;
  gap: 20px;
}
.navbar-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 15px;
  margin: 0;
  padding: 0;
  list-style: none;
}
.navbar-nav .nav-link {
  font-weight: 700;
  color: #000000;
  padding: 10px 15px;
  position: relative;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease-in-out;
  text-decoration: none;
  display: inline-block;
}
.navbar-nav .nav-link:hover {
  color: #f9a825;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
</style>

@extends('layouts.app')

@section('content')
  <div class="welcome-banner">
    <img src="{{ asset('images/BANNER.png') }}" alt="Banner BimbelKita">
  </div>

  <br>
<h4>Materi TryOut</h4>
<div class="slider">
  <div class="slides">
    <a href="https://bimbelkita.up.railway.app/images/materi/TPS/PU1.pdf" target="_blank">
      <img src="{{ asset('images/PU.png') }}" alt="PU">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/TPS/PPU1.pdf" target="_blank">
      <img src="{{ asset('images/PPU.png') }}" alt="PPU">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/TPS/PB2.pdf" target="_blank">
      <img src="{{ asset('images/PBM.png') }}" alt="PBM">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/TPS/PK1.pdf" target="_blank">
      <img src="{{ asset('images/PK.png') }}" alt="PK">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/Literasi/BI1.pdf" target="_blank">
      <img src="{{ asset('images/LBI.png') }}" alt="LBI">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/Literasi/E1.pdf" target="_blank">
      <img src="{{ asset('images/LBING.png') }}" alt="LBING">
    </a>
    <a href="https://bimbelkita.up.railway.app/images/materi/Literasi/MTK1.pdf" target="_blank">
      <img src="{{ asset('images/PM.png') }}" alt="PM">
    </a>
  </div>
</div>

  <div class="text-center mt-4">
    <a href="{{ route('materi.index') }}" class="btn btn-mulai-belajar">Selengkapnya</a>
  </div>

  <h2 class="text-center mt-4">Pilih fitur yang ingin kamu akses :</h2>
  <div class="fitur-container">
    <a href="{{ route('materi.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/materi.png') }}" alt="Materi" class="fitur-icon">
      <p>Materi</p>
    </a>
    <a href="{{ route('tryout.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/tryout.png') }}" alt="TryOut" class="fitur-icon">
      <p>TryOut</p>
    </a>
    <a href="{{ route('ptn.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/ptn.png') }}" alt="PTN & Jurusan" class="fitur-icon">
      <p>Rekomendasi PTN</p>
    </a>
    <a href="{{ route('banksoal') }}" class="fitur-box">
      <img src="{{ asset('images/icons/banksoal.png') }}" alt="Bank Soal" class="fitur-icon">
      <p>Bank Soal</p>
    </a>
    <a href="{{ route('forum.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/forum.png') }}" alt="Forum Diskusi" class="fitur-icon">
      <p>Forum Diskusi</p>
    </a>
    <a href="{{ route('live-class.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/liveclass.png') }}" alt="Live Class" class="fitur-icon">
      <p>Live Class</p>
    </a>
    <a href="{{ route('video.pembelajaran') }}" class="fitur-box">
      <img src="{{ asset('images/icons/video.png') }}" alt="Video Pembelajaran" class="fitur-icon">
      <p>Video<br>Pembelajaran</p>
    </a>
    <a href="{{ route('sertifikat.index') }}" class="fitur-box">
      <img src="{{ asset('images/icons/sertifikat.png') }}" alt="Sertifikat" class="fitur-icon">
      <p>Sertifikat</p>
    </a>
  </div>

  <div class="tryout-banner">
    <a href="{{ route('tryout.index') }}">
      <img src="{{ asset('images/TO.png') }}" alt="TryOut BimbelKita">
    </a>
  </div>

  <div class="text-center mt-5">
    <a href="{{ route('live-class.index') }}">
      <img src="{{ asset('images/live.png') }}" alt="Live BimbelKita" class="img-fluid">
    </a>
  </div>
@endsection
