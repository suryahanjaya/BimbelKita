@extends('layouts.app')

@section('content')
<div class="TA">
    <div class="TB">
        <!-- Header -->
        <div class="TC">
            <h1 class="TD">Sertifikat Tryout</h1>
            
            <!-- Score Summary -->
            <div class="TE">
                <div class="TF">
                    <div class="TG">Skor TPS Terbaru</div>
                    <div class="TH">{{ $latestTps->total_score ?? 0 }}</div>
                    @if($latestTps)
                        <div class="TI">{{ $latestTps->completed_at->format('d M Y, H:i') }}</div>
                    @endif
                </div>
                <div class="TJ">
                    <div class="TK">Skor Literasi Terbaru</div>
                    <div class="TL">{{ $latestLiterasi->total_score ?? 0 }}</div>
                    @if($latestLiterasi)
                        <div class="TM">{{ $latestLiterasi->completed_at->format('d M Y, H:i') }}</div>
                    @endif
                </div>
                <div class="TN">
                    <div class="TO">Total Skor</div>
                    <div class="TP">
                        {{ ($latestTps ? $latestTps->total_score : 0) + ($latestLiterasi ? $latestLiterasi->total_score : 0) }}
                    </div>
                </div>
            </div>

            <!-- Certificate Info -->
            <div class="TQ">
                <p class="TR">
                    Sertifikat ini menunjukkan hasil tryout terbaru Anda untuk TPS dan Literasi.
                    <br>Skor yang ditampilkan adalah skor dari tryout terakhir yang Anda selesaikan.
                </p>
                @if(!$latestTps && !$latestLiterasi)
                    <div class="TS">
                        <p class="TU">Anda belum menyelesaikan tryout TPS maupun Literasi.</p>
                    </div>
                @else
                    <a href="{{ route('sertifikat.generate') }}" 
                        class="TV">
                        Download Sertifikat
                    </a>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <div class="TX">
            <a href="{{ route('home') }}" class="TY">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection 