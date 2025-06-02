<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="panduan.to">
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
