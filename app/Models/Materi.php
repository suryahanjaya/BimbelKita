<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'subkategori_materi_id', 
        'judul', 
        'deskripsi', 
        'isi'
    ];

    public function subkategoriMateri()
    {
        return $this->belongsTo(SubkategoriMateri::class);
    }
}
