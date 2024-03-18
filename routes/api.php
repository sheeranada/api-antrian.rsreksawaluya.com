<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnlokController;
use App\Http\Controllers\AnpolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('ralan', [AnpolController::class, 'RegPeriksa']);
Route::post('antri-ralan', [AnpolController::class, 'submitPasien']);
Route::get('anpol', [AnpolController::class, 'anpol']);
// admisi
Route::prefix('admisi')->group(function () {
    Route::get('last-ticket-print', [AnlokController::class, 'lastTicket']);
    Route::get('last-entry', [AnlokController::class, 'nomorDilayani']);
    Route::post('antrianadmisi', [AnlokController::class, 'antrianAdmisi'])->name('submitLoket');
});
