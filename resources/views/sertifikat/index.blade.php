@extends('layouts.app')

<style>
    .TA {
        display: flex;
        justify-content: center;
        padding: 2rem;
        background-color: #f0f8ff; 
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .TB {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 900px;
        padding: 2rem;
    }

    .TC {
        text-align: center;
    }

    .TD {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #ffa07a;
        display: inline-block;
        padding-bottom: 0.5rem;
    }

    .TE {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .TF, .TJ, .TN {
        background-color: #e6f2ff;
        padding: 1rem;
        border-radius: 10px;
        flex: 1 1 30%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .TG, .TK, .TO {
        font-weight: bold;
        color: #007acc;
        margin-bottom: 0.5rem;
    }

    .TH, .TL, .TP {
        font-size: 1.5rem;
        color: #ff7f50;
        font-weight: bold;
    }

    .TI, .TM {
        margin-top: 0.5rem;
        font-size: 0.9rem;
        color: #555;
    }

    .TQ {
        margin-top: 1rem;
        background-color: #fff8f0;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .TR {
        color: #444;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .TS {
        background-color: #ffe6e6;
        padding: 1rem;
        border-radius: 8px;
    }

    .TU {
        color: #cc0000;
        font-weight: bold;
    }

    .TV {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        background-color: #ffa07a;
        color: #fff;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .TV:hover {
        background-color: #ff8c66;
    }

    .TX {
        text-align: center;
        margin-top: 2rem;
    }

    .TY {
        color: #007acc;
        text-decoration: none;
        font-weight: bold;
        border-bottom: 1px solid transparent;
        transition: border-color 0.3s;
    }

    .TY:hover {
        border-color: #007acc;
    }
</style>

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