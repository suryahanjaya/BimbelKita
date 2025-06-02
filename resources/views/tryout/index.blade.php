@extends('layouts.app')
<style>
    /* Import Google Fonts Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

.ia {
    font-family: 'Poppins', sans-serif;
    max-width: 900px;
    margin: 2rem auto;
    padding: 1rem;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.ib {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 2rem;
    text-align: center;
}

.ic {
    display: flex;
    flex-direction: column;
    gap: 3rem;
}

/* Section: Tryout Types */
.id {
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
}

.ie {
    font-size: 1.8rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 1rem;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 0.5rem;
}

.if {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.ig {
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    background-color: #f9fafb;
}

.ih {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 0.25rem;
}

.ii {
    font-size: 1rem;
    color: #64748b;
    margin-bottom: 1rem;
}

.ij {
    margin-bottom: 1rem;
}

.ik {
    font-weight: 600;
    color: #334155;
    margin-bottom: 0.25rem;
}

.il {
    list-style-type: disc;
    padding-left: 1.5rem;
    color: #475569;
}

.il li {
    margin-bottom: 0.25rem;
}

/* Form Input */
.im {
    display: block;
    font-weight: 600;
    margin-bottom: 0.3rem;
    color: #334155;
}

.in {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1.5px solid #cbd5e1;
    border-radius: 8px;
    font-size: 1rem;
    color: #334155;
    transition: border-color 0.3s ease;
}

.in:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3);
}

/* Button */
.io {
    background-color: #2563eb;
    color: white;
    font-weight: 600;
    padding: 0.6rem 1.5rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: background-color 0.3s ease;
    margin-top: 0.5rem;
    width: 100%;
}

.io:hover {
    background-color: #1e40af;
}

/* Section: User History */
.ip {
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
}

.iq {
    font-size: 1.8rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 1rem;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 0.5rem;
}

.is {
    color: #64748b;
    font-style: italic;
    text-align: center;
}

.it {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.iu {
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    background-color: #f9fafb;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.iv {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ix {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2563eb;
}

.iy {
    font-size: 1rem;
    color: #475569;
}

.iz {
    padding: 0.2rem 0.75rem;
    border-radius: 9999px;
    font-weight: 600;
    font-size: 0.9rem;
    user-select: none;
}

.bg-green-100 {
    background-color: #dcfce7;
}

.text-green-800 {
    color: #166534;
}

.bg-yellow-100 {
    background-color: #fef3c7;
}

.text-yellow-800 {
    color: #b45309;
}

.iaa, .iae {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.5rem;
    color: #475569;
    font-size: 0.9rem;
}

.iab, .iac, .iad {
    margin: 0;
}

.iaf {
    color: #2563eb;
    font-weight: 600;
    text-decoration: underline;
    cursor: pointer;
    transition: color 0.3s ease;
}

.iaf:hover {
    color: #1e40af;
}

.iag button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    color: #2563eb;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 6px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.iag button:hover {
    background-color: #e0e7ff;
    color: #1e40af;
}

</style>
@section('content')
<div class="ia">
    <h1 class="ib">Try Out UTBK</h1>

    <div class="ic">
        <!-- Available Tryout Types -->
        <div class="id">
            <h2 class="ie">Pilih Jenis Tryout</h2>
            <div class="if">
                @foreach($tryoutTypes as $type)
                    <div class="ig">
                        <h3 class="ih">{{ $type->name }}</h3>
                        <p class="ii">{{ $type->description }}</p>
                        <div class="ij">
                            <h4 class="ik">Subtes:</h4>
                            <ul class="il">
                                @foreach($type->subtests->sortBy('order') as $subtest)
                                    <li>{{ $subtest->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ route('tryout.start', $type) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="participant_name_{{ $type->id }}" class="im">Nama Peserta</label>
                                <input type="text" name="participant_name" id="participant_name_{{ $type->id }}" required
                                    class="in">
                            </div>
                            <button type="submit" class="io">
                                Mulai Tryout
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <br>
        <!-- User's Previous Sessions -->
        <div class="ip">
            <h2 class="iq">Riwayat Tryout</h2>
            @if($userSessions->isEmpty())
                <p class="is">Belum ada riwayat tryout.</p>
            @else
                <div class="it">
                    @foreach($userSessions as $session)
                        <div class="iu">
                            <div class="iv">
                                <div>
                                    <h3 class="ix">{{ $session->tryoutType->name }}</h3>
                                    <p class="iy">{{ $session->participant_name }}</p>
                                </div>
                                <span class="iz {{ $session->isCompleted() ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $session->isCompleted() ? 'Selesai' : 'Sedang Berlangsung' }}
                                </span>
                            </div>
                            <div class="iaa">
                                <p class="iab">
                                    Mulai   : {{ $session->started_at->format('d M Y, H:i') }}
                                </p>
                                @if($session->completed_at)
                                    <p class="iac">
                                        Selesai : {{ $session->completed_at->format('d M Y, H:i') }}
                                    </p>
                                    <p class="iad">
                                        Skor Total  : {{ $session->total_score }}
                                    </p>
                                @endif
                            </div>
                            <div class="iae">
                                @if($session->isCompleted())
                                    <a href="{{ route('tryout.results', $session) }}" 
                                        class="iaf">
                                            Lihat Hasil
                                    </a>
                                @else
                                    <form action="{{ route('tryout.start-subtest', $session) }}" method="POST" class="iag">
                                        @csrf
                                        <button type="submit" 
                                            class="text-blue-600 hover:text-blue-800 font-poppins font-medium py-2 px-4 rounded-md transition-colors">
                                            Lanjutkan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection