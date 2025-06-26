<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PresensiPegawaiController;
use App\Http\Controllers\API\KokabController;
use App\Http\Controllers\API\ProvinsiController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\DosenAPIController;
use App\Http\Controllers\ProxyController;

Route::get('/dosen/{dosen_id}/matakuliah', [DosenAPIController::class, 'matakuliahByDosen']);
Route::post('/dosen/matakuliah', [DosenAPIController::class, 'addRelasi']);

// API Resource Routes
Route::apiResource('pegawai', PegawaiController::class);
Route::apiResource('presensi', PresensiPegawaiController::class);
Route::apiResource('kokab', KokabController::class);
Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('status', StatusController::class);
// Route::match(['get', 'post', 'put', 'patch'], '/proxy', [ProxyController::class, 'proxy']);
