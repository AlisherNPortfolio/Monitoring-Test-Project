<?php

use App\Http\Controllers\ActiveSessionController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NegativeBalanceController;
use App\Http\Controllers\NetworkStatusController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Uzcard Monitoring';
});

Route::get('/sw_quais', [StatisticsController::class, 'sw_quais']);
Route::get('transactions', [StatisticsController::class, 'transactions']);
Route::get('details', [StatisticsController::class, 'details']);
Route::get('map', [MapController::class, 'index']);

Route::get('/get-transaction-data', [TransactionController::class, 'get_transaction_data']);
Route::get('/get-map-data', [MapController::class, 'get_map_data']);
Route::get('/get-network-data', [NetworkStatusController::class, 'get']);
Route::get('/get-negative-balance', [NegativeBalanceController::class, 'get']);
Route::get('/get-svbo', [ActiveSessionController::class, 'getSvbo']);
Route::get('/get-svfe', [ActiveSessionController::class, 'getSvfe']);
Route::get('/get-ips-svbo', [ActiveSessionController::class, 'getIpsSvbo']);
Route::get('/get-ips-svfe', [ActiveSessionController::class, 'getIpsSvfe']);
Route::get('/get-ips-transaction', [TransactionController::class, 'getSomeTransactions']);
