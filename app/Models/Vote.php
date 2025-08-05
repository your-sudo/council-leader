<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'nis',
        'voted_caksis_id',
        'voted_cawaksis_id',
    ];
}
