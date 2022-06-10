<?php

namespace App\Models;

use App\Casts\ModifiedTime;
use App\Casts\StrToTime;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [];

    protected $casts = [
        'time' => StrToTime::class,
        'some_time' => ModifiedTime::class
    ];
}
