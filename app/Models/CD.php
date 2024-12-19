<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    protected $fillable = [
        'Judul_CD',
        'Genre',
        'Tahun_Terbit',
    ];

}
