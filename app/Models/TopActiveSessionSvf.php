<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\ActiveSvfTm;

class TopActiveSessionSvf extends Model
{
    protected $fillable = [];

    protected $casts = [
        'time' => ActiveSvfTm::class
    ];
}
