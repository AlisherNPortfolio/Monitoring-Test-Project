<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode', 'lat', 'long'
    ];

    public function test()
    {
        $this->save();
    }
}
