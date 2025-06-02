<style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

.pa {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.pb {
    background: #ffffff;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.pc h1.pd {
    font-size: 2rem;
    font-weight: 700;
    color: #2364aa;
    margin-bottom: 1.5rem;
}

.pe {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

.pf, .pi, .pl {
    flex: 1;
    background-color: #dbeafe;
    border-left: 5px solid #3b82f6;
    border-radius: 8px;
    padding: 1rem;
    text-align: center;
}

.pg, .pj, .pm {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #1d4ed8;
}

.ph, .pk, .pn {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3a8a;
}

.po .pq {
    background-color: #fff7ed;
    border-left: 5px solid #f97316;
    padding: 1rem;
    border-radius: 8px;
    color: #92400e;
    font-weight: 500;
}

.pr {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.pu {
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 1rem;
    background-color: #ffffff;
}

.pu.bg-green-50 {
    background-color: #ecfdf5;
    border-color: #10b981;
}

.ps {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pt {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2364aa;
}

.pv {
    color: #4b5563;
    font-size: 0.95rem;
    margin-top: 0.25rem;
}

.pw {
    text-align: right;
}

.px {
    font-size: 0.875rem;
    color: #6b7280;
}

.py {
    font-size: 1.25rem;
    font-weight: 700;
    color: #f97316;
}

.pz {
    margin-top: 2rem;
}

.pab, .pak {
    margin-bottom: 2rem;
}

.pac, .pal {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e3a8a;
    margin-bottom: 1rem;
}

.pae, .pan {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.paf, .pao {
    background-color: #e0f2fe;
    padding: 1rem;
    border-radius: 8px;
    border-left: 5px solid #3b82f6;
}

.pag, .pap {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pah, .paq {
    font-weight: 600;
    color: #1e40af;
}

.pai, .par {
    font-size: 0.85rem;
    color: #6b7280;
}

.paj, .pas {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2563eb;
}

.pat {
    margin-top: 2rem;
    text-align: center;
}

.pau {
    display: inline-block;
    background-color: #3b82f6;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s;
}

.pau:hover {
    background-color: #2563eb;
}
</style>
@extends('layouts.app')

@section('content')
<div class="pa">
    <div class="pb">
        <!-- Header -->
        <div class="pc">
            <h1 class="pd">Rekomendasi PTN</h1>
            
            <!-- Score Summary -->
            <div class="pe">
                <div class="pf">
                    <div class="pg">Skor TPS Tertinggi</div>
                    <div class="ph">{{ $highestTpsScore ?? 0 }}</div>
                </div>
                <div class="pi">
                    <div class="pj">Skor Literasi Tertinggi</div>
                    <div class="pk">{{ $highestLiterasiScore ?? 0 }}</div>
                </div>
                <div class="pl">
                    <div class="pm">Total Skor Tertinggi</div>
                    <div class="pn">{{ $totalHighestScore }}</div>
                </div>
            </div>

            <!-- Recommendations -->
            @if($generalAdvice)
                <div class="po">
                    <p class="pq">{{ $generalAdvice }}</p>
                </div>
            @else
                <div class="pr">
                    @foreach($ptnRecommendations as $ptn)
                        <div class="pu {{ $loop->first ? 'bg-green-50' : '' }}">
                            <div class="ps">
                                <div>
                                    <h3 class="pt">{{ $ptn->name }}</h3>
                                    <p class="pv">{{ $ptn->description }}</p>
                                </div>
                                <div class="pw">
                                    <div class="px">Min. Skor</div>
                                    <div class="py">{{ $ptn->min_score }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Tryout History -->
        <div class="pz">
            <!-- TPS History -->
            <div class="pab">
                <h2 class="pac">Riwayat TPS</h2>
                @if($tpsHistory->isEmpty())
                    <p class="pad">Belum ada riwayat tryout TPS.</p>
                @else
                    <div class="pae">
                        @foreach($tpsHistory as $session)
                            <div class="paf">
                                <div class="pag">
                                    <div>
                                        <p class="pah">{{ $session->participant_name }}</p>
                                        <p class="pai">
                                            {{ optional($session->completed_at)->format('d M Y, H:i') ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="paj">
                                        {{ $session->total_score }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Literasi History -->
            <div class="pak">
                <h2 class="pal">Riwayat Literasi</h2>
                @if($literasiHistory->isEmpty())
                    <p class="pam">Belum ada riwayat tryout Literasi.</p>
                @else
                    <div class="pan">
                        @foreach($literasiHistory as $session)
                            <div class="pao">
                                <div class="pap">
                                    <div>
                                        <p class="paq">{{ $session->participant_name }}</p>
                                        <p class="par">
                                            {{ optional($session->completed_at)->format('d M Y, H:i') ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="pas">
                                        {{ $session->total_score }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <div class="pat">
            <a href="{{ route('home') }}" class="pau">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection