<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'pengajar',
        'hari',
        'tanggal',
        'mulai',
        'selesai',
        'link_gmeet',
        'foto',
    ];
}
