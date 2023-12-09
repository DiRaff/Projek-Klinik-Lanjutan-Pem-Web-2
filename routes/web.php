<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AdministrasiController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('pasien/laporan', [PasienController::class, 'laporan'])->name('pasien.laporan');
Route::get('dokter/laporan', [DokterController::class, 'laporan'])->name('dokter.laporan');

Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::resource('administrasi', AdministrasiController::class);
