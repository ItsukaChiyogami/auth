<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspapers extends Model
{
    protected $fillable = [
        'Judul_Newspapers',
        'Isi',
        'Tahun_Terbit',
    ];
}
