<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PresensiController extends Controller
{
// Tampilkan form buka kelas (presensi)
public function showForm() {
return view('dosen.presensi.form');
}

// Proses buka kelas & create pertemuan (API ke service admin)
public function bukaKelas(Request $request) {
$request->validate([
'kelas_id' => 'required|integer',
'tanggal' => 'required|date'
]);

$url = config('services.admin_origin') . '/api/presensi/pertemuan';

$response = Http::withHeaders([
'Origin' => config('services.urls.dosen_service'),
'Authorization' => 'Bearer ' . config('services.tokens.dosen_service')
])->post($url, [ 'kelas_id' => $request->kelas_id,
'id_dosen' => $request->id_pegawai,
'tanggal' => $request->tanggal ]);

if ($response->successful()) {
$id_presensi_dsn = $response->json('id_presensi_dsn');
return redirect()->route('dosen.presensi.rekap', $id_presensi_dsn) ->with('success', 'Pertemuan berhasil dibuat');
}

return back()->with('error', 'Gagal membuka kelas: ' . $response->json('message'));
}

// Tampilkan rekap presensi per pertemuan
public function rekapPresensi($id_presensi_dsn) {
$url = config('services.admin_origin') . "/api/presensi/{$id_presensi_dsn}";
$response = Http::withHeaders([
'Origin' => config('services.urls.dosen_service'),
'Authorization' => 'Bearer ' . config('services.tokens.dosen_service') ])->get($url);

if ($response->successful()) {
$rekap = $response->json();

return view('dosen.presensi.rekap', compact('rekap'));
}

return back()->with('error', 'Gagal memuat data rekap presensi');
}

// Update status presensi mahasiswa
public function updatePresensi(Request $request, $id) {
$request->validate([
'status' => 'required|in:H,S,I,A'
]);

$url = config('services.urls.admin_service') . "/api/presensi/update/{$id}";
$response = Http::withHeaders([
'Origin' => config('http:://ti054e02.agussbn.my.id'),
'Authorization' => 'Bearer ' . config('services.tokens.dosen_service')
])->put($url, [ 'status' => $request->status ]);

if ($response->successful()) {
return back()->with('success', 'Status presensi berhasil diperbarui');
}

return back()->with('error', 'Gagal memperbarui presensi');
}
}
