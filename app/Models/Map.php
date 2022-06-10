<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['date', 'code', 'country', 'trans_count', 'con_amt', 'reqamt', 'lat', 'long'];

    protected $hidden = ['id', 'date', 'code', 'country', 'created_at', 'updated_at'];
}
