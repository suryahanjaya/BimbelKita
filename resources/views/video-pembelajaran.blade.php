<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-primary fw-bold">Video Pembelajaran UTBK</h2>

{{-- ================= TPS ================= --}}
<div class="video-section">
    <h4>TPS - Penalaran Umum</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['IKCHh53ML10', '-jYbkayP-Pc'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Penalaran Umum</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="video-section mt-5">
    <h4>TPS - Pengetahuan dan Pemahaman Umum</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['AUlGFp_4MHk', 'KcP-X4To-Sk'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Pengetahuan dan Pemahaman Umum</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="video-section mt-5">
    <h4>TPS - Pemahaman Bacaan dan Menulis</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['oMLSAiC1xYo', 'URV25lXqPvI'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Pemahaman Bacaan dan Menulis</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="video-section mt-5">
    <h4>TPS - Pengetahuan Kuantitatif</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['ypwSyhjHQSI', 'Md3Edm9RCwE'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Pengetahuan Kuantitatif</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- ================= Tes Literasi ================= --}}
<div class="video-section mt-5">
    <h4>Tes Literasi - Bahasa Indonesia</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['_HbBbf8DXd0', 'q6PgFN5Wupc'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Literasi Bahasa Indonesia</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="video-section mt-5">
    <h4>Tes Literasi - Bahasa Inggris</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['faK265pM0FU', 'CaAa5ZbnHkE'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Literasi Bahasa Inggris</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="video-section mt-5">
    <h4>Tes Literasi - Penalaran Matematika</h4>
    <div class="row g-4 justify-content-center">
        @foreach(['Ho-Ce2JQZ_A', 'jQPyzRbHmVw'] as $video)
        <div class="col-md-6 col-lg-5">
            <div class="video-card">
                <div class="video-title">Penalaran Matematika</div>
                <div class="video-frame ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<a href="{{ route('home') }}" class="btn btn-secondary mt-4">Kembali ke Beranda</a>

@endsection