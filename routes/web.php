<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PegawaiWebController;
use App\Http\Controllers\Web\StatusWebController;
use App\Http\Controllers\Web\KokabWebController;
use App\Http\Controllers\Web\ProvinsiWebController;
use App\Http\Controllers\Web\PresensiWebController;

// Halaman beranda
Route::get('/', function () {
    return view('welcome');
});

// Group route dengan prefix "admin"
Route::prefix('adminpgw')->group(function () {

    // CRUD Pegawai
    Route::resource('pegawai', PegawaiWebController::class);

    // CRUD Status
    Route::resource('status', StatusWebController::class);

    // CRUD Kota/Kabupaten
    Route::resource('kokab', KokabWebController::class);

    // CRUD Provinsi
    Route::resource('provinsi', ProvinsiWebController::class);

    // CRUD Presensi
    Route::resource('presensi', PresensiWebController::class);
});
