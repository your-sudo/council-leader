<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;

        protected $fillable = [
        'nama',
        'visi',
        'misi',
        'foto',
        'calon_jabatan',
    ];
}
