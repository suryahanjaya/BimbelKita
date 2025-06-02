<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMateri extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    public function subkategoriMateris()
    {
        return $this->hasMany(SubkategoriMateri::class);
    }
}