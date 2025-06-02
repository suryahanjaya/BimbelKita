<style>
    h2, h3 {
        color: #444;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }

    .card-img-top {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        max-height: 180px;
        object-fit: cover;
    }

    .card-title {
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: #222;
    }

    strong {
        color: #2581f9;
    }

    .badge {
        font-weight: 600;
        font-size: 0.85rem;
        border-radius: 12px;
        padding: 0.4em 0.8em;
        display: inline-block;
    }

    .bg-success {
        background-color: #6cbf84; 
        color: #1f3d28;
    }

    .bg-warning {
        background-color: #e6d89c;  
        color: #635b2b;
    }

    .bg-secondary {
        background-color: #a1a1a1; 
        color: #2c2c2c;
    }

    .bg-danger {
        background-color: #e27d7d; 
        color: #5f2222;
    }

    .btn {
        border-radius: 6px;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: background-color 0.3s ease;
        box-shadow: none;
        border: none;
    }

    .btn-success {
        background-color: #6cbf84;
        color: #1f3d28;
    }

    .btn-success:hover {
        background-color: #5bb36d;
    }

    .btn-secondary {
        background-color: #004080;
        color: #2c2c2c;
    }

    .btn-secondary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .btn-outline-primary {
        color: #555555;
        border-color: #555555;
    }

    .btn-outline-primary:hover {
        background-color: #555555;
        color: white;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    h2.mb-4 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 2rem;
    color: #333333;
        line-height: 1.2;
    }

</style>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Live Class</h2>

    <p><strong>Waktu sekarang   :</strong> {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>

    @foreach($groupedLiveClasses as $month => $classes)
        <h3 class="mt-4">
            {{ \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y') }}
        </h3>

        <div class="row">
            @foreach($classes as $class)
                @php
                    $status = $class->status;
                    $badge = match($status) {
                        'aktif' => 'success',
                        'belum_mulai' => 'warning',
                        'lewat', 'bukan_hari_ini' => 'secondary',
                    };
                    $statusText = match($status) {
                        'aktif' => 'Sedang Berlangsung',
                        'belum_mulai' => 'Belum Dimulai',
                        'lewat' => 'Sudah Lewat',
                        'bukan_hari_ini' => 'Bukan Hari Ini',
                    };
                @endphp

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($class->foto)
                            <img src="{{ asset('storage/' . $class->foto) }}" class="card-img-top" alt="Foto Live Class">
                        @endif
                        <div class="card-body">
                            @if ($status === 'aktif')
                                <span class="badge bg-danger mb-1">LIVE</span>
                            @endif
                            <span class="badge bg-{{ $badge }} mb-2">{{ $statusText }}</span>
                            <h5 class="card-title">{{ $class->judul }}</h5>
                            <p><strong>Pengajar:</strong> {{ $class->pengajar }}</p>
                            <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($class->tanggal)->translatedFormat('l, d F Y') }} ({{ $class->mulai }} - {{ $class->selesai }})</p>

                            @auth
                                @if ($status === 'aktif' && $class->link_gmeet)
                                    <a href="{{ $class->link_gmeet }}" target="_blank" class="btn btn-success">Join</a>
                                @else
                                    <button class="btn btn-secondary" disabled>{{ $statusText }}</button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login untuk Join</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

</div>

{{-- Tombol kembali --}}
<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>

@endsection