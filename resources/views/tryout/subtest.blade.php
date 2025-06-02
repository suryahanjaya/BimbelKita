@extends('layouts.app')
<style>
    <style>
    /* Scoped font-family hanya di dalam container .sa */
    .sa, .sa * {
        font-family: 'Poppins', sans-serif;
    }

    /* Container utama */
    .sa {
        max-width: 900px;
        margin: 2rem auto;
        padding: 1rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }

    .sa .sb {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* Header */
    .sa .sc {
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 1rem;
    }

    .sa .sd {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .sa .se {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }

    .sa .sf {
        font-size: 1.1rem;
        color: #64748b;
        margin-top: 0.2rem;
    }

    /* Timer */
    .sa .sg {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .sa .sh {
        text-align: center;
    }

    .sa #timer {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2563eb; /* blue-600 */
    }

    .sa #timer.text-red-600 {
        color: #dc2626; /* red-600 */
    }

    .sa #timer.animate-pulse {
        animation: pulse 1.5s infinite;
    }

    .sq {
        text-align: left;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .sa #timer-progress {
        width: 150px;
        height: 8px;
        background: #e0e7ff; /* blue-200 */
        border-radius: 6px;
        overflow: hidden;
    }

    .sa #timer-bar {
        height: 100%;
        background-color: #2563eb; /* blue-600 */
        width: 100%;
        transition: width 0.3s ease;
        border-radius: 6px;
    }

    .sa #timer-bar.bg-red-600 {
        background-color: #dc2626; /* red-600 */
    }

    .sa .sl {
        font-size: 0.9rem;
        color: #64748b;
        margin-top: 0.25rem;
    }


    .sa .sm {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .sa .sn {
        background-color: #f8fafc;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        box-shadow: 0 2px 6px rgba(31, 110, 255, 0.15);
    }

    .sa .so {
        margin-bottom: 0.75rem;
    }

    .sa .sp {
        font-size: 1.25rem;
        font-weight: 600;
        color: #0e1428;
        margin: 0 0 0.5rem 0;
    }

    .sa .sq {
        font-size: 1rem;
        color: #334155;
        white-space: pre-wrap;
        text-align: left; /* tambahan ini */
    }


    /* Options */
    .sa .sr {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        text-align: left;
    }

    .sa .st {
        display: flex;
        align-items: flex-start;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 8px;
        border: 1px solid transparent;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .sa .st:hover {
        background-color: #e0e7ff;
        border-color: #2563eb;
    }

    .sa .su {
        margin-right: 1rem;
        margin-top: 0.25rem;
        cursor: pointer;
    }

    .sa .sv {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .sa .sx {
        font-weight: 700;
        color: #0e1933;
        min-width: 20px;
        user-select: none;
    }


    /* Submit Button */
    .sa .sz {
        margin-top: 2rem;
        text-align: right;
    }

    .sa .sab {
        background-color: #2563eb;
        color: white;
        font-weight: 600;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.1rem;
    }

    .sa .sab:hover {
        background-color: #1e40af;
    }
</style>
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