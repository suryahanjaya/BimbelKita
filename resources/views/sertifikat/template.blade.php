<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <title>Sertifikat Tryout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .certificate {
            width: 100%;
            padding: 10px 20px;
            box-sizing: border-box;
        }
        .border {
            border: 2px solid #4f46e5;
            padding: 20px;
            text-align: center;
            position: relative;
            background: #ffffff;
        }
        .header {
            background: #4f46e5;
            margin: -20px -20px 20px;
            padding: 15px;
            border-bottom: 2px solid #4f46e5;
        }
        .title {
            color: #ffffff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 4px;
        }
        .subtitle {
            color: #ffffff;
            font-size: 18px;
        }
        .recipient {
            margin: 20px 0 15px;
        }
        .recipient p {
            color: #4f46e5;
            font-size: 15px;
            margin: 0 0 8px;
            font-weight: bold;
        }
        .name {
            background: #4f46e5;
            color: white;
            display: inline-block;
            padding: 6px 24px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 4px;
        }
        .description {
            color: #333;
            font-size: 15px;
            margin: 12px 0;
        }
        .scores-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 15px 0;
            flex-wrap: wrap;
        }
        .score-section {
            flex: 0 0 48%;
            border: 1px solid #4f46e5;
            border-radius: 4px;
            background: white;
        }
        .score-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .score-table th {
            background: #4f46e5;
            color: white;
            padding: 6px;
            text-align: center;
            font-size: 14px;
        }
        .score-table td {
            padding: 4px 6px;
            border: 1px solid #e5e7eb;
            color: #333;
        }
        .score-value {
            text-align: center;
            font-weight: bold;
            color: #4f46e5;
        }
        .total-row {
            background-color: #f3f4ff;
        }
        .total-row td {
            font-weight: bold;
            color: #4f46e5;
        }
        .completion-date {
            text-align: right;
            font-style: italic;
            color: #666;
            font-size: 11px;
            padding: 4px 6px;
            background: #f8f9fa;
            border-top: 1px solid #e5e7eb;
        }
        .total-score {
            background: #4f46e5;
            color: white;
            padding: 6px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            margin: 15px 0;
            display: inline-block;
        }
        .date {
            margin-top: 10px;
            font-style: italic;
            color: #333;
            font-size: 13px;
        }
        .watermark {
            position: absolute;
            bottom: 15px;
            right: 15px;
            opacity: 0.05;
            font-size: 60px;
            font-weight: bold;
            color: #4f46e5;
            transform: rotate(-45deg);
            user-select: none;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="border">
            <div class="header">
                <div class="title">SERTIFIKAT</div>
                <div class="subtitle">Tryout UTBK BimbelKita</div>
            </div>

            <div class="recipient">
                <p>Diberikan kepada:</p>
                <div class="name">{{ $user->username ?? $user->name }}</div>
            </div>

            <div class="description">
                Telah menyelesaikan Tryout UTBK dengan hasil sebagai berikut:
            </div>

            <div class="scores-container">
                @if($tps)
                <div class="score-section">
                    <table class="score-table">
                        <thead>
                            <tr>
                                <th colspan="2">Tes Potensi Skolastik (TPS)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tps->subtestAnswers as $answer)
                            <tr>
                                <td>{{ $answer->subtest->name }}</td>
                                <td class="score-value">{{ $answer->score }}</td>
                            </tr>
                            @endforeach
                            <tr class="total-row">
                                <td>Total TPS</td>
                                <td class="score-value">{{ $tps->total_score }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="completion-date">
                        Diselesaikan: {{ $tps->completed_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                @endif

                @if($literasi)
                <div class="score-section">
                    <table class="score-table">
                        <thead>
                            <tr>
                                <th colspan="2">Tes Literasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($literasi->subtestAnswers as $answer)
                            <tr>
                                <td>{{ $answer->subtest->name }}</td>
                                <td class="score-value">{{ $answer->score }}</td>
                            </tr>
                            @endforeach
                            <tr class="total-row">
                                <td>Total Literasi</td>
                                <td class="score-value">{{ $literasi->total_score }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="completion-date">
                        Diselesaikan: {{ $literasi->completed_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                @endif
            </div>

            <div class="total-score">
                Skor Total: {{ $totalScore }}
            </div>

            <div class="date">
                Surabaya, {{ $date }}
            </div>

            <div class="watermark">BimbelKita</div>
        </div>
    </div>
</body>
</html>
