@extends('layouts.app')

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

.hasil {
  font-family: 'Poppins', sans-serif;
}


.bg-white {
    background-color: #ffffff;
}

.rounded-lg {
    border-radius: 12px;
}

.shadow-md {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.p-6 {
    padding: 1.5rem;
}

.mb-8 {
    margin-bottom: 2rem;
}

.text-center {
    text-align: center;
}

.text-3xl {
    font-size: 1.875rem;
    line-height: 2.25rem;
}

.font-bold {
    font-weight: 700;
}

.mb-2 {
    margin-bottom: 0.5rem;
}

.text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
}

.text-gray-600 {
    color: #718096;
}

.mt-4 {
    margin-top: 1rem;
}

.text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem;
}

.text-blue-600 {
    color: #60a5fa;
}

.text-orange-400 {
    color: #fbbf24;
}

.font-semibold {
    font-weight: 600;
}

.mb-6 {
    margin-bottom: 1.5rem;
}

.space-y-4 > * + * {
    margin-top: 1rem;
}

.border {
    border: 1px solid #e2e8f0;
}

.p-4 {
    padding: 1rem;
}

.flex {
    display: flex;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}

.text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
}

.text-right {
    text-align: right;
}

.font-medium {
    font-weight: 500;
}

.min-w-full {
    min-width: 100%;
}

.border-b {
    border-bottom: 1px solid #e2e8f0;
}

.bg-blue-50 {
    background-color: #ebf8ff;
}

.table th {
    background-color: #bfdbfe;
}

.table tr.bg-blue-50 {
    background-color: #fef3c7; 
}

.KD {
    display: inline-block;
    padding: 12px 30px;
    background-color: #60a5fa;
    color: white;
    border-radius: 30px;
    font-weight: 700;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.KD:hover {
    background-color: #3b82f6;
}

</style>

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="hasil">
            <div class="text-center">
                <h1 class="text-3xl font-bold mb-2">Hasil Tryout</h1>
                <p class="text-xl text-gray-600">{{ $session->tryoutType->name }}</p>
                <p class="text-gray-600">{{ $session->participant_name }}</p>
                <div class="mt-4">
                    <div class="text-4xl font-bold text-blue-600">{{ $session->total_score }}</div>
                    <p class="text-sm text-gray-600">Skor Total</p>
                </div>
            </div>
        </div>

        <!-- Subtest Scores -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Detail Skor per Subtes</h2>
            <div class="space-y-4">
                @foreach($session->subtestAnswers as $subtestAnswer)
                    <div class="border rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-medium">{{ $subtestAnswer->subtest->name }}</h3>
                                <p class="text-sm text-gray-600">
                                    Waktu: {{ $subtestAnswer->started_at ? $subtestAnswer->started_at->format('H:i') : '-' }}
                                    @if($subtestAnswer->completed_at)
                                        - {{ $subtestAnswer->completed_at->format('H:i') }}
                                    @endif
                                </p>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">{{ $subtestAnswer->score ?? 0 }}/5</div>
                                <p class="text-sm text-gray-600">Benar</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Leaderboard -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Papan Peringkat</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-3 text-left">Peringkat</th>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-right">Skor</th>
                            <th class="px-4 py-3 text-right">Waktu Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaderboard as $index => $entry)
                            <tr class="border-b {{ $entry->id === $session->id ? 'bg-blue-50' : '' }}">
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $entry->participant_name }}</td>
                                <td class="px-4 py-3 text-right font-medium">{{ $entry->total_score }}</td>
                                <td class="px-4 py-3 text-right text-gray-600">
                                    {{ $entry->completed_at ? $entry->completed_at->format('d M Y, H:i') : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 text-center">
            <br>
            <a href="{{ route('tryout.index') }}" class="KD">
                Kembali ke Daftar Tryout
            </a>
            <br>
        </div>
    </div>
</div>
@endsection