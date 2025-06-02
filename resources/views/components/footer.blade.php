<footer class="footer bg-light py-5">
  <style>
    .footer {
      background-color: #f7f7f7;
      color: #333;
       font-size: 17px;
    }

    .footer-column h5 {
      color: #399df0; 
      font-size: 23px;
    }

    .footer-column a {
      color: #333 !important;
      text-decoration: none !important;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: color 0.3s ease;
    }

    .footer-column a:hover {
      color: #fcae7b !important;
      text-decoration: none !important;
    }

    .footer-column i {
      color: inherit; 
    }

    .footer-logo {
    }

    .footer-bottom {
      border-top: 1px solid #ffff;
      padding-top: 15px;
      margin-top: 20px;
      font-size: 0.9rem;
      color: #666;
    }

    ul.list-unstyled li a {
      color: #333;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    ul.list-unstyled li a:hover {
      color: #fcae7b;
      text-decoration: none;
    }
  </style>

<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" rel="stylesheet" />

  <div class="container text-center">
    <div class="footer-container d-flex flex-wrap justify-content-between text-start mt-4">
      
      <div class="footer-column">
        <h5 class="fw-bold">Hubungi Kami</h5>
        <a href="https://maps.app.goo.gl/6HpYxb88KeBaSpGo9" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-map-marker-alt"></i> Gedung A10, Teknik Informatika, Kampus 1 UNESA
        </a><br>
        <a href="mailto:najwadariel.23033@mhs.unesa.ac.id">
          <i class="fas fa-envelope"></i> bimbelkita.official
        </a><br>
        <a href="https://wa.me/6281263436187?text=Halo,%20saya%20ingin%20bertanya%20lebih%20lanjut" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-phone"></i> +62 812-6343-6187
        </a>
      </div>

      <div class="footer-column">
        <h5 class="fw-bold">Menu</h5>
        <div class="row">
          <div class="col">
            <ul class="list-unstyled">
              <li><a href="{{ route('materi.index') }}">Materi UTBK</a></li>
              <li><a href="{{ route('tryout.index') }}">TryOut</a></li>
              <li><a href="{{ route('ptn.index') }}">PTN & Jurusan</a></li>
              <li><a href="{{ route('banksoal') }}">Bank Soal</a></li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-unstyled">
              <li><a href="{{ route('forum.index') }}">Forum Diskusi</a></li>
              <li><a href="{{ route('live-class.index') }}">Live Class</a></li>
              <li><a href="{{ route('video.pembelajaran') }}">Video Pembelajaran</a></li>
              <li><a href="{{ route('sertifikat.index') }}">Sertifikat</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="footer-column">
        <h5 class="fw-bold">Sosial Media</h5>
        <a href="https://www.youtube.com/@BimbelKita-g7x" target="_blank" rel="noopener noreferrer" style="color: inherit;">
          <i class="fab fa-youtube" style="color: red;"></i> bimbelkita.official
        </a><br>
        <a href="https://www.instagram.com/_bimbelkitaa/" target="_blank" rel="noopener noreferrer" style="color: inherit;">
          <i class="fab fa-instagram" style="color: #e1306c;"></i> bimbelkita.aja
        </a>
      </div>

    </div>

    <a href="{{ route('home') }}">
      <img src="{{ asset('images/logo1.png') }}" alt="BimbelKita Logo" class="footer-logo my-4" style="height: 50px;">
    </a>
    <div class="footer-bottom text-center mt-4">
      <p class="mb-0 text-muted">&copy; 2025 BimbelKita. All rights reserved.</p>
    </div>
  </div>
</footer>