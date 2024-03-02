<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnpolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('poli', [AnpolController::class, 'tampilkanPoli']);
Route::post('submitAnpol', [AnpolController::class, 'submitPasien'])->name('submitAnpol');
