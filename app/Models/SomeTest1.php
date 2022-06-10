<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\ActiveSvfTm;

class SomeTest1 extends Model
{
    protected $fillable = [];

    protected $casts = [
        'some2' => ActiveSvfTm::class
    ];

    // public $timestamps = false;
}
