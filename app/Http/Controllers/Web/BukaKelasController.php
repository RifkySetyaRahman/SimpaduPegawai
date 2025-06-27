<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\AbsensiDosen;
use App\Models\PresensiPegawai;

class BukaKelasController extends Controller
{
    // URL base API service Prodi (ganti sesuai alamat sebenarnya)
    private $prodiApiBaseUrl = 'https://service-prodi.example.com/api';

    /**
     * Endpoint untuk dosen buka absen
     * Simpan absensi dosen dan panggil service Prodi buka absen mahasiswa
     */
    public function bukaAbsen(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'matakuliah_id' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Simpan absensi dosen dengan status hadir
        $absensiDosen = PresensiPegawai::create([
            'dosen_id' => $request->dosen_id,
            'matakuliah_id' => $request->matakuliah_id,
            'tanggal' => $request->tanggal,
            'status' => 'hadir',
        ]);

        // Panggil API service Prodi untuk buka absensi mahasiswa
        $response = Http::post($this->prodiApiBaseUrl . '/absensi-mahasiswa/buka', [
            'matakuliah_id' => $request->matakuliah_id,
            'tanggal' => $request->tanggal,
        ]);

        if ($response->failed()) {
            // Jika gagal, hapus absensi dosen agar konsisten
            $absensiDosen->delete();

            return response()->json([
                'message' => 'Gagal membuka absensi mahasiswa di service Prodi',
                'errors' => $response->json(),
            ], 500);
        }

        return response()->json([
            'message' => 'Absensi dosen tercatat dan absensi mahasiswa berhasil dibuka',
            'absensi_dosen' => $absensiDosen,
            'absensi_mahasiswa_response' => $response->json(),
        ]);
    }
}
