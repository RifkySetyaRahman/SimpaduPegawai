<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PresensiPegawai;
use Illuminate\Http\Request;

class PresensiPegawaiController extends Controller
{
    // Ambil semua data presensi
    public function index()
    {
        $presensi = PresensiPegawai::with('pegawai')->get();
        return response()->json($presensi);
    }

    // Simpan data presensi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'status_presensi' => 'required|in:Hadir,Izin,Sakit,Alpa',
            // Tidak perlu validasi tanggal & waktu jika otomatis
        ]);

        $presensi = PresensiPegawai::create([
            'id_pegawai' => $validated['id_pegawai'],
            'status_presensi' => $validated['status_presensi'],
            'tanggal' => now()->toDateString(),
            'waktu' => now()->toTimeString(),
        ]);

        return response()->json([
            'message' => 'Presensi berhasil disimpan',
            'data' => $presensi
        ], 201);
    }

    // Ambil satu data presensi
    public function show($id)
    {
        $presensi = PresensiPegawai::with('pegawai')->findOrFail($id);
        return response()->json($presensi);
    }

    public function update(Request $request, $id)
{
    $presensi = PresensiPegawai::findOrFail($id);

    $validated = $request->validate([
        'status_presensi' => 'required|in:Hadir,Izin,Sakit,Alpa'
        // Jika ingin selalu update otomatis waktu dan tanggal:
        // 'tanggal' dan 'waktu' tidak perlu divalidasi dari request
    ]);

    // Set waktu dan tanggal secara otomatis
    $validated['tanggal'] = now()->toDateString();
    $validated['waktu'] = now()->toTimeString();

    $presensi->update($validated);

    return response()->json([
        'message' => 'Presensi berhasil diperbarui',
        'data' => $presensi
    ]);
}


    // Hapus data presensi
    public function destroy($id)
    {
        $presensi = PresensiPegawai::findOrFail($id);
        $presensi->delete();

        return response()->json(['message' => 'Presensi berhasil dihapus']);
    }
}
