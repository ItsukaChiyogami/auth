<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'Judul_Jurnal',
        'Penulis',
        'Penerbit',
        'Deskripsi',
        'Tahun_Terbit',
    ];

}
