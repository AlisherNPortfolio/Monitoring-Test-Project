<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ModifiedTime implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        $hh = implode(":", str_split($value, 2));
        $now = Carbon::now('Asia/Tashkent');
        $now = $now->year . "-" . $now->month . "-" . $now->day . " " . $hh;
        try {
            return Carbon::createFromFormat('Y-m-d H:i', $now, 'Asia/Tashkent');
        } catch (\Exception $e) {
            Log::info("Error in the ModifiedTime cast. Cause: " . $e->getMessage());
        }
    }
}
