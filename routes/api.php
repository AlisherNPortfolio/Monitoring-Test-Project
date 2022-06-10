<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('transaction', function () {
    Artisan::call('transaction:get');
});

Route::get('map', function () {
    Artisan::call('map:get');
});

Route::get('network', function () {
    Artisan::call('network:get');
});

Route::get('negative', function () {
    Artisan::call('negative:get');
});

Route::get('mock-transaction', function () {
    Artisan::call('transaction:mock');
});

Route::get('active-session', function () {
    Artisan::call('active-session:get');
});

Route::get('test', function () {
    $time = "15.03.2021 10:17:00";

    return date('d-m-Y H:i:s', strtotime($time));
});
