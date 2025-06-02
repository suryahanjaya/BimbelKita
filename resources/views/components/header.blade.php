<link rel="stylesheet" href="{{ asset('style.css') }}">

<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="BimbelKita" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Menu Utama -->
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('materi.index') }}">Materi UTBK</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tryout.index') }}">TryOut</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('ptn.index') }}">PTN & Jurusan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('banksoal') }}">Bank Soal</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('forum.index') }}">Forum Diskusi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('live-class.index') }}">Live Class</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('video.pembelajaran') }}">Video Pembelajaran</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('sertifikat.index') }}">Sertifikat</a></li>
      </ul>

      <!-- Auth Buttons -->
      <ul class="navbar-nav ms-3 align-items-center">
        @guest
          <li class="nav-item me-2">
            <a class="btn btn-outline-dark" href="{{ route('login') }}">Masuk</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning text-white" href="{{ route('register') }}">Daftar</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
              </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
