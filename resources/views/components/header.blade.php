<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
  <style>
    .custom-navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgb(0 0 0 / 0.05);
    }

    /* Logo */
    .custom-navbar .navbar-brand {
      padding: 0.25rem 1rem; 
      margin-left: -170px;
    }
    .custom-navbar .navbar-brand .logo {
      height: 60px;
      transition: opacity 0.3s ease;
      cursor: pointer;
      display: block;
    }
    .custom-navbar .navbar-brand .logo:hover {
      opacity: 0.8;
    }

    .custom-navbar .navbar-nav .nav-item {
      margin-right: 1rem;
    }
    .custom-navbar .navbar-nav .nav-item:last-child {
      margin-right: 0;
    }

    .custom-navbar .nav-link {
      color: #4e4c4c;
      font-weight: 800; 
      transition: color 0.3s ease;
    }
    .custom-navbar .nav-link:hover,
    .custom-navbar .nav-link:focus {
      color: #4a90e2;
    }

    /* Tombol Masuk */
    .custom-navbar .btn-outline-dark {
      color: #0a0a0a;
      border-color: #0a0a0a;
      transition: background-color 0.3s ease, color 0.3s ease;
      font-weight: 600;
    }
    .custom-navbar .btn-outline-dark:hover {
      background-color: #4a90e2;
      border-color: #4a90e2;
      color: #ffffff;
    }

    /* Tombol Daftar */
    .custom-navbar .btn-warning {
      background-color: #4a90e2;
      border-color: #4a90e2;
      color: white;
      transition: background-color 0.3s ease, border-color 0.3s ease;
      font-weight: 600;
    }
    .custom-navbar .btn-warning:hover {
      background-color: #f9a825;
      border-color: #f9a825;
      color: white;
    }

    .custom-navbar .dropdown-menu {
      background-color: #ffffff;
      border: 1px solid #4a90e2;
    }
    .custom-navbar .dropdown-menu .dropdown-item {
      color: #0a0a0a;
      transition: background-color 0.3s ease, color 0.3s ease;
      font-weight: 600;
    }
    .custom-navbar .dropdown-menu .dropdown-item:hover,
    .custom-navbar .dropdown-menu .dropdown-item:focus {
      background-color: #4a90e2;
      color: white;
    }

    .navbar-toggler {
      border-color: #4a90e2;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%234a90e2' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
  </style>

  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="BimbelKita" class="logo" />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('materi.index') }}">Materi UTBK</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tryout.index') }}">TryOut</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ptn.index') }}">PTN & Jurusan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('banksoal') }}">Bank Soal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('forum.index') }}">Forum Diskusi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('live-class.index') }}">Live Class</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('video.pembelajaran') }}">Video Pembelajaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sertifikat.index') }}">Sertifikat</a>
        </li>
      </ul>

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
          <a
            id="navbarDropdown"
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a
                href="#"
                class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
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