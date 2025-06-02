<style>

    .panduan {
  font-family: 'Poppins', sans-serif;
}

    .panduan.to {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f7fa;
    color: #1e293b;
    margin: 0;
    padding: 0;
}

.panduan.to {
    max-width: 800px;
    margin: 3rem auto;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    padding: 2.5rem 2rem;
}

.PTO {
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    color: #1f6eff;
    margin-bottom: 2rem;
}

.informasi section {
    margin-bottom: 2.5rem;
}

.informasiumum,
.subtest,
.aturan,
.sistem {
    font-size: 1.75rem;
    font-weight: 600;
    color: #2563eb;
    border-bottom: 3px solid #2563eb;
    padding-bottom: 0.4rem;
    margin-bottom: 1rem;
    border-radius: 6px 6px 0 0;
}

.Infolist,
.listaturan,
.sistemnilai {
    list-style-type: disc;
    padding-left: 1.5rem;
    color: #334155;
    line-height: 1.7;
}

.sub-card {
    background-color: #e0e7ff;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 6px rgba(31, 110, 255, 0.3);
}

.subtitle {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f40af;
    margin-bottom: 0.3rem;
}

.subinfo {
    font-size: 0.9rem;
    color: #475569;
}

.mulai {
    text-align: center;
    margin-top: 2rem;
}

.btn-mulai {
    background-color: #f9a825;
    color: #ffffff;
    font-weight: 600;
    font-size: 1.15rem;
    padding: 14px 40px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-shadow: 0 8px 15px rgb(108, 108, 111);
}

.btn-mulai:hover {
    background-color: #5477d8;
}

@media (max-width: 480px) {
    .panduan.to {
        margin: 1.5rem 1rem;
        padding: 2rem 1.5rem;
    }

    .PTO {
        font-size: 2rem;
    }

    .informasi section {
        margin-bottom: 2rem;
    }

    .informasiumum,
    .subtest,
    .aturan,
    .sistem {
        font-size: 1.4rem;
    }

    .btn-mulai {
        padding: 12px 30px;
        font-size: 1rem;
    }
}
</style>
@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

@section('content')
<div class="panduan to" style="font-family: 'Poppins', sans-serif;">
    <div class="panduan">
        <h1 class="PTO">
            Panduan Tryout {{ $session->tryoutType->name }}
        </h1>

        <div class="informasi">
            <section>
                <h2 class="informasiumum">
                    Informasi Umum
                </h2>
                <ul class="Infolist">
                    <li>Tryout terdiri dari <strong>{{ $session->tryoutType->subtests->count() }}</strong> subtes</li>
                    <li>Setiap subtes memiliki waktu pengerjaan 15 menit</li>
                    <li>Setiap subtes berisi 5 soal pilihan ganda</li>
                    <li>Setiap soal memiliki 5 opsi jawaban (A-E)</li>
                </ul>
            </section>

            <section>
                <h2 class="subtest">
                    Subtest
                </h2>
                <div>
                    @foreach($session->tryoutType->subtests as $subtest)
                        <div class="sub-card">
                            <h3 class="subtitle">{{ $subtest->name }}</h3>
                            <p class="subinfo">Waktu: 15 menit &bull; Jumlah Soal: 5</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section>
                <h2 class="aturan">
                    Aturan Pengerjaan
                </h2>
                <ul class="listaturan">
                    <li>Timer akan berjalan saat Anda memulai setiap subtes</li>
                    <li>Setelah waktu habis atau Anda menekan tombol "Submit", jawaban akan otomatis tersimpan</li>
                    <li>Anda tidak dapat kembali ke subtes yang sudah selesai</li>
                    <li>Pastikan koneksi internet Anda stabil selama mengerjakan tryout</li>
                </ul>
            </section>

            <section>
                <h2 class="sistem">
                    Sistem Penilaian
                </h2>
                <ul class="sistemnilai">
                    <li>Setiap jawaban benar mendapatkan 1 poin</li>
                    <li>Tidak ada pengurangan nilai untuk jawaban salah</li>
                    <li>Skor akhir adalah total jawaban benar dari seluruh subtes</li>
                    <li>Hasil dan peringkat akan ditampilkan setelah seluruh subtes selesai</li>
                </ul>
            </section>

            <div class="mulai">
                <form action="{{ route('tryout.start-subtest', $session) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-mulai">
                        Mulai Tryout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection