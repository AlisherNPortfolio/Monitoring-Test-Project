<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\ModifiedTime;
use App\Casts\StrToTime;

class SomeTransaction extends Model
{
    protected $fillable = [];

    protected $casts = [
        'time' => StrToTime::class,
        'some_time' => ModifiedTime::class
    ];
}
