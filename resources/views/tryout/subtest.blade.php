@extends('layouts.app')

@section('content')
<div class="sa">
    <div class="sb">
        <!-- Header -->
        <div class="sc">
            <div class="sd">
                <div>
                    <h1 class="se">{{ $subtestAnswer->subtest->name }}</h1>
                    <p class="sf">{{ $session->tryoutType->name }}</p>
                </div>
                <div class="sg">
                    <div class="sh">
                        <div id="timer" class="si">15:00</div>
                        <div id="timer-progress" class="sj">
                            <div id="timer-bar" class="sk" style="width: 100%"></div>
                        </div>
                        <p class="sl">Waktu Tersisa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Questions -->
        <form id="subtestForm" action="{{ route('tryout.submit-subtest', [$session, $subtestAnswer]) }}" method="POST">
            @csrf
            <div class="sm">
                @foreach($questions as $index => $question)
                    <div class="sn">
                        <div class="so">
                            <h3 class="sp">Soal {{ $index + 1 }}</h3>
                            <div class="sq">
                                {!! nl2br(e($question->question_text)) !!}
                            </div>
                        </div>

                        <div class="sr">
                            @foreach($question->options as $option)
                                <label class="st">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->option_label }}"
                                        class="su">
                                    <div class="sv">
                                        <span class="sx">{{ $option->option_label }}.</span>
                                        <span>{!! nl2br(e($option->option_text)) !!}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="sz">
                <button type="submit" class="sab">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const timerElement = document.getElementById('timer');
    const timerBar = document.getElementById('timer-bar');
    const form = document.getElementById('subtestForm');

    // Timer settings
    const DURATION = 15 * 60; // 15 minutes in seconds
    let timeLeft = DURATION;
    let animationFrameId = null;
    let lastUpdate = Date.now();

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = seconds % 60;
        return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
    }

    function updateTimer() {
        const now = Date.now();
        const delta = Math.floor((now - lastUpdate) / 1000);
        
        if (delta >= 1) {
            timeLeft = Math.max(0, timeLeft - delta);
            lastUpdate = now;

            // Update timer display
            timerElement.textContent = formatTime(timeLeft);

            // Update progress bar
            const percentageLeft = (timeLeft / DURATION) * 100;
            timerBar.style.width = `${percentageLeft}%`;

            // Change color when time is running low
            if (percentageLeft <= 25) {
                timerBar.classList.remove('bg-blue-600');
                timerBar.classList.add('bg-red-600');
                timerElement.classList.remove('text-blue-600');
                timerElement.classList.add('text-red-600');

                if (percentageLeft <= 10) {
                    timerElement.classList.add('animate-pulse');
                }
            }

            // Check if time is up
            if (timeLeft <= 0) {
                cancelAnimationFrame(animationFrameId);
                form.submit();
                return;
            }
        }

        animationFrameId = requestAnimationFrame(updateTimer);
    }

    // Start the timer
    updateTimer();

    // Prevent form submission if time is up
    form.addEventListener('submit', function(e) {
        if (timeLeft <= 0) {
            e.preventDefault();
        }
    });

    // Warn before leaving page
    window.addEventListener('beforeunload', function(e) {
        if (timeLeft > 0) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    // Clean up on page unload
    window.addEventListener('unload', function() {
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
        }
    });
});
</script>
@endpush
@endsection 