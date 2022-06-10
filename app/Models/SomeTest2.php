<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\ActiveSvfTm;

class SomeTest2 extends Model
{
    protected $fillable = [];

    protected $casts = [
        'time' => ActiveSvfTm::class
    ];

    // public $timestamps = false;
}
