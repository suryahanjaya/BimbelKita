<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Try Out UTBK</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Available Tryout Types -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Pilih Jenis Tryout</h2>
            <div class="space-y-6">
                @foreach($tryoutTypes as $type)
                    <div class="border rounded-lg p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $type->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $type->description }}</p>
                        <div class="mb-4">
                            <h4 class="font-medium mb-2">Subtes:</h4>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach($type->subtests->sortBy('order') as $subtest)
                                    <li>{{ $subtest->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ route('tryout.start', $type) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="participant_name_{{ $type->id }}" class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                                <input type="text" name="participant_name" id="participant_name_{{ $type->id }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
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
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Riwayat Tryout</h2>
            @if($userSessions->isEmpty())
                <p class="text-gray-600">Belum ada riwayat tryout.</p>
            @else
                <div class="space-y-4">
                    @foreach($userSessions as $session)
                        <div class="border rounded-lg p-4 space-y-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $session->tryoutType->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $session->participant_name }}</p>
                                </div>
                                <span class="px-2 py-1 text-sm rounded-full {{ $session->isCompleted() ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $session->isCompleted() ? 'Selesai' : 'Sedang Berlangsung' }}
                                </span>
                            </div>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600">
                                    Mulai   : {{ $session->started_at->format('d M Y, H:i') }}
                                </p>
                                @if($session->completed_at)
                                    <p class="text-sm text-gray-600">
                                        Selesai : {{ $session->completed_at->format('d M Y, H:i') }}
                                    </p>
                                    <p class="mt-2 font-medium">
                                        Skor Total  : {{ $session->total_score }}
                                    </p>
                                @endif
                            </div>
                            <div class="mt-4">
                                @if($session->isCompleted())
                                    <a href="{{ route('tryout.results', $session) }}" 
                                        class="inline-block bg-blue-600 text-white font-poppins font-medium py-2 px-4 rounded-md hover:bg-blue-700 transition-colors no-underline hover:no-underline">
                                            Lihat Hasil
                                    </a>
                                @else
                                    <form action="{{ route('tryout.start-subtest', $session) }}" method="POST" class="inline">
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
