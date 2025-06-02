<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveClass;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class LiveClassController extends Controller
{
    public function index()
    {
        $today = Carbon::now();

        // Ambil data live class, urut berdasarkan tanggal dan mulai
        $liveClasses = LiveClass::orderBy('tanggal')->orderBy('mulai')->get();

        // Set status untuk tiap kelas (aktif, lewat, dll)
        foreach ($liveClasses as $class) {
            $classDate = Carbon::parse($class->tanggal);
            $startTime = Carbon::parse($class->tanggal . ' ' . $class->mulai);
            $endTime = Carbon::parse($class->tanggal . ' ' . $class->selesai);

            if ($classDate->isSameDay($today)) {
                if ($today->between($startTime, $endTime)) {
                    $class->status = 'aktif';
                } elseif ($today->greaterThan($endTime)) {
                    $class->status = 'lewat';
                } else {
                    $class->status = 'belum_mulai';
                }
            } else {
                $class->status = 'bukan_hari_ini';
            }
        }

        // Group kelas berdasarkan bulan-tahun, misal '2025-05'
        $grouped = $liveClasses->groupBy(function ($item) {
            return Carbon::parse($item->tanggal)->format('Y-m');
        });

        // Kirim data grouped ke view
        return view('live_class.index', [
            'groupedLiveClasses' => $grouped,
            'today' => $today,
        ]);
    }

    

}
