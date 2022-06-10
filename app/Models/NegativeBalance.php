<?php

namespace App\Models;

use App\Casts\NumberStringConvert;
use Illuminate\Database\Eloquent\Model;

class NegativeBalance extends Model
{
    protected $fillable = ['sum', 'time1', 'time2', 'count', 'full_time'];
    public $timestamps = false;

    protected $casts = [
        'sum' => NumberStringConvert::class
    ];
}
