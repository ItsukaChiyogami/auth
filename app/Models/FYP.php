<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FYP extends Model
{
    protected $fillable = [
        'Judul_FYP',
        'Isi',
        'Tahun_Terbit',
    ];
}
