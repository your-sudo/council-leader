<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

        protected $fillable = [
        'nama',
        'visi',
        'misi',
        'program_kerja',
        'foto',
        'calon_jabatan',
    ];
}
