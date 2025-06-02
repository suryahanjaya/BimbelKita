@extends('layouts.app')
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1.5rem;
    }

    .card {
        font-family: 'Poppins', sans-serif;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 20px;
        margin-bottom: 1.5rem;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }

    .card-header {
        font-weight: 600;
        font-size: 1.125rem;
        color: #2563eb;
        border-bottom: 2px solid #e0e7ff;
        padding-bottom: 8px;
        margin-bottom: 12px;
    }

    .card-body p, ul, ul li, .btn {
        font-family: 'Poppins', sans-serif;
    }

    .card-body p {
        margin-bottom: 10px;
        line-height: 1.5;
        color: #333;
    }

    ul {
        list-style-type: disc;
        padding-left: 20px;
        margin-bottom: 15px;
        color: #374151;
    }

    ul li {
        margin-bottom: 6px;
        font-weight: 400;
    }

    .btn {
        display: inline-block;
        background-color: #2563eb;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #1d4ed8;
        color: white;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }
</style>
@endpush
@section('content')
<h2 class="mb-4">Bank Soal UTBK</h2>

@php
$soals = [
    [
        'kategori' => 'TPS - Penalaran Umum',
        'pertanyaan' => 'Jika semua A adalah B, dan semua B adalah C, maka semua A adalah?',
        'pilihan' => ['A. A', 'B. B', 'C. C', 'D. Tidak dapat ditentukan'],
        'jawaban' => 'C. C',
        'pembahasan' => 'Logika silogisme: Jika A ⊆ B dan B ⊆ C, maka A ⊆ C.'
    ],
    [
        'kategori' => 'TPS - Pengetahuan dan Pemahaman Umum',
        'pertanyaan' => 'Apa ibukota Indonesia?',
        'pilihan' => ['A. Jakarta', 'B. Bandung', 'C. Surabaya', 'D. Medan'],
        'jawaban' => 'A. Jakarta',
        'pembahasan' => 'Jakarta adalah ibukota negara Indonesia.'
    ],
    [
        'kategori' => 'TPS - Pemahaman Bacaan dan Menulis',
        'pertanyaan' => 'Apa tujuan utama paragraf berikut ini?',
        'pilihan' => ['A. Menghibur', 'B. Memberi informasi', 'C. Meyakinkan', 'D. Mengkritik'],
        'jawaban' => 'B. Memberi informasi',
        'pembahasan' => 'Paragraf tersebut berisi informasi dan penjelasan mengenai suatu topik.'
    ],
    [
        'kategori' => 'Tes Literasi - Literasi Bahasa Indonesia',
        'pertanyaan' => 'Apa makna kata "ambisi" dalam kalimat berikut?',
        'pilihan' => ['A. Keinginan kuat', 'B. Kebohongan', 'C. Kebingungan', 'D. Ketenangan'],
        'jawaban' => 'A. Keinginan kuat',
        'pembahasan' => 'Ambisi berarti keinginan yang kuat untuk mencapai sesuatu.'
    ],
    [
        'kategori' => 'Tes Literasi - Literasi Bahasa Inggris',
        'pertanyaan' => 'Choose the correct meaning of the word "benevolent".',
        'pilihan' => ['A. Kind', 'B. Angry', 'C. Lazy', 'D. Sad'],
        'jawaban' => 'A. Kind',
        'pembahasan' => 'Benevolent means well-meaning and kindly.'
    ],
    [
        'kategori' => 'Tes Literasi - Penalaran Matematika',
        'pertanyaan' => 'What is the value of x if 2x + 3 = 11?',
        'pilihan' => ['A. 3', 'B. 4', 'C. 5', 'D. 6'],
        'jawaban' => 'A. 4',
        'pembahasan' => '2x + 3 = 11 → 2x = 8 → x = 4.'
    ],
];
@endphp

@foreach ($soals as $index => $soal)
    <div class="card mb-4">
        <div class="card-header">
            <strong>{{ $index + 1 }}. {{ $soal['kategori'] }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Pertanyaan:</strong> {{ $soal['pertanyaan'] }}</p>
            @if (!empty($soal['pilihan']))
                <ul>
                    @foreach ($soal['pilihan'] as $pilihan)
                        <li>{{ $pilihan }}</li>
                    @endforeach
                </ul>
            @endif
            <p><strong>Jawaban    :</strong> {{ $soal['jawaban'] }}</p>
            <p><strong>Pembahasan :</strong> {{ $soal['pembahasan'] }}</p>
        </div>
    </div>
@endforeach

<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>

@endsection