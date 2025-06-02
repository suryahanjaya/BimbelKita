<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriMateri;
use App\Models\SubkategoriMateri;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter kategori dan subkategori dari query param
        $kategoriId = $request->input('kategori');
        $subkategoriId = $request->input('subkategori');

        $query = Materi::query();

        if ($subkategoriId) {
            $query->where('subkategori_materi_id', $subkategoriId);
        } elseif ($kategoriId) {
            // Jika hanya filter kategori, cari subkategori di kategori itu dulu
            $subkategoriIds = SubkategoriMateri::where('kategori_materi_id', $kategoriId)->pluck('id');
            $query->whereIn('subkategori_materi_id', $subkategoriIds);
        }

        $materis = $query->get();

        $kategoriMateris = KategoriMateri::with('subkategoriMateris')->get();

        return view('materi.index', compact('materis', 'kategoriMateris', 'kategoriId', 'subkategoriId'));
    }
    
    public function show($id)
    {
        $materi = Materi::findOrFail($id);
        return view('materi.show', compact('materi'));
    }

}
