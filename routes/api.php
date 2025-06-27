<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\PresensiPegawaiController;
use App\Http\Controllers\API\KokabController;
use App\Http\Controllers\API\ProvinsiController;
use App\Http\Controllers\API\StatusController;
<<<<<<< HEAD
use App\Http\Controllers\Api\DosenApiController;
=======
use App\Http\Controllers\API\DosenAPIController;
>>>>>>> 089f44e84586d05e9ee02a44a3e57a5d0cbc7ed3
use App\Http\Controllers\ProxyController;

Route::get('/dosen/{dosen_id}/matakuliah', [DosenAPIController::class, 'matakuliahByDosen']);
Route::post('/dosen/matakuliah', [DosenAPIController::class, 'addRelasi']);

// API Resource Routes
Route::apiResource('pegawai', PegawaiController::class);
Route::apiResource('presensi', PresensiPegawaiController::class);
Route::apiResource('kokab', KokabController::class);
Route::apiResource('provinsi', ProvinsiController::class);
Route::apiResource('status', StatusController::class);
<<<<<<< HEAD
Route::match(['get', 'post', 'put', 'patch'], '/proxy', [ProxyController::class, 'proxy']);
=======
// Route::match(['get', 'post', 'put', 'patch'], '/proxy', [ProxyController::class, 'proxy']);
>>>>>>> 089f44e84586d05e9ee02a44a3e57a5d0cbc7ed3
