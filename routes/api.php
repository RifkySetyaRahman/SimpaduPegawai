<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PresensiPegawaiController;
use App\Http\Controllers\API\KoKabController;
use App\Http\Controllers\API\ProvinsiController;
use App\Http\Controllers\API\StatusController;

// API Resource Routes
Route::apiResource('pegawai', PegawaiController::class);
Route::apiResource('presensi', PresensiPegawaiController::class);
Route::apiResource('kokab', KoKabController::class);
Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('status', StatusController::class);
