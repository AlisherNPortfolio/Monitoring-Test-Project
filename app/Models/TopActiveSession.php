<?php

namespace App\Models;

use App\Casts\TopActiveSessionTime;
use Illuminate\Database\Eloquent\Model;

class TopActiveSession extends Model
{
    protected $fillable = [];

    protected $casts = [
        'time' => TopActiveSessionTime::class
    ];
}
