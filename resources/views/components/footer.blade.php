<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<footer class="footer bg-light py-5">
  <div class="container text-center">
    <div class="footer-container d-flex flex-wrap justify-content-between text-start mt-4">
      
      <!-- Hubungi Kami -->
      <div class="footer-column">
        <h5 class="text-primary fw-bold">Hubungi Kami</h5>
        <a href="https://maps.app.goo.gl/6HpYxb88KeBaSpGo9">
        <p><i class="fas fa-map-marker-alt text-primary"></i> Gedung A10, Teknik Informatika, Kampus 1 UNESA</p>
        </a>
        <a href="mailto:najwadariel.23033@mhs.unesa.ac.id">
        <p><i class="fas fa-envelope text-primary"></i> bimbelkita.official</p>
        </a>
        <a href="https://wa.me/6281263436187?text=Halo,%20saya%20ingin%20bertanya%20lebih%20lanjut" target="_blank">
        <p><i class="fas fa-phone text-primary"></i> +62 812-6343-6187</p>
        </a>
      </div>

      <!-- Menu Fitur -->
      <div class="footer-column">
        <h5 class="text-primary fw-bold">Menu</h5>
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

      <!-- Sosial Media -->
      <div class="footer-column">
        <h5 class="text-primary fw-bold">Sosial Media</h5>
        <a href="https://www.youtube.com/@BimbelKita-g7x">
        <p><i class="fab fa-youtube" style="color: red;"></i> bimbelkita.official</p>
        </a>
        <a href="https://www.instagram.com/_bimbelkitaa/">
        <p><i class="fab fa-instagram" style="color: #e1306c;"></i> bimbelkita.aja</p>
        </a>
      </div>

    </div>

    <a href="{{ route('home') }}">
      <img src="{{ asset('images/logo.png') }}" alt="BimbelKita Logo" class="footer-logo mb-4" style="height: 50px;">
    </a>
    <div class="footer-bottom text-center mt-4">
      <p class="mb-0 text-muted">&copy; 2025 BimbelKita. All rights reserved.</p>
    </div>
  </div>
</footer>