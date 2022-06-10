<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class NetworkStatus extends Model
{
    protected $fillable = ['network', 'some1', 'some1_status', 'some1_status', 'timeouts'];

    protected $casts = [
        'some1_status' => 'boolean',
        'some1_status' => 'boolean'
    ];

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    // }
}
