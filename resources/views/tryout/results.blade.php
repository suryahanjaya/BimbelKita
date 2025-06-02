@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
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
        </div>
    </div>
</div>
@endsection 