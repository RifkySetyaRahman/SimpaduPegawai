<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\DosenWebController;
use App\Http\Controllers\Web\KokabWebController;
use App\Http\Controllers\Api\BukaKelasController;
use App\Http\Controllers\Web\StatusWebController;
use App\Http\Controllers\Web\PegawaiWebController;
use App\Http\Controllers\Web\PresensiWebController;
use App\Http\Controllers\Web\ProvinsiWebController;

// Halaman beranda
Route::get('/', function () {
    return view('welcome');
});

// Group route dengan prefix "adminpgw"
Route::prefix('adminpgw')->group(function () {
    Route::resource('pegawai', PegawaiWebController::class);
    Route::resource('status', StatusWebController::class);
    Route::resource('kokab', KokabWebController::class);
    Route::resource('provinsi', ProvinsiWebController::class);
    Route::resource('presensi', PresensiWebController::class);
});

// Group route untuk dosen
Route::prefix('dosen')->group(function () {
    Route::get('/buka-kelas', [BukaKelasController::class, 'index'])->name('dosen.buka-kelas.index');
    Route::post('/buka-kelas/absen-dosen', [BukaKelasController::class, 'absenDosen'])->name('dosen.absen.dosen');
});
    Route::get('matakuliah', [DosenWebController::class, 'index'])->name('dosen.matakuliah.index');
    Route::get('matakuliah/create', [DosenWebController::class, 'create'])->name('dosen.matakuliah.create');
    Route::post('matakuliah', [DosenWebController::class, 'store'])->name('dosen.matakuliah.store');
    Route::delete('matakuliah/{id}', [DosenWebController::class, 'destroy'])->name('dosen.matakuliah.destroy');

