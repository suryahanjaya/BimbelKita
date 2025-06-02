<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubkategoriMateri extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_materi_id', 'nama_subkategori'];

    public function kategoriMateri()
    {
        return $this->belongsTo(KategoriMateri::class);
    }

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }
}
