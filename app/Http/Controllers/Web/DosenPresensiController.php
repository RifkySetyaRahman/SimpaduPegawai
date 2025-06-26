<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class DosenPresensiController extends Controller
{
    // Tampilkan form pembukaan presensi
    public function showForm()
    {
        return view('dosen.presensi.form');
    }

    public function bukaKelas(Request $request)
    {
        $request->validate([
            'id_kelas_mk' => 'required|integer',
            'pertemuan_ke' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $email = Auth::user()?->email ?? $request->input('email') ?? $request->header('X-User-Email');

        if (!$email) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        $pegawai = Pegawai::where('email', $email)->first();

        if (!$pegawai) {
            return back()->with('error', 'Pegawai tidak ditemukan.');
        }

        if (strtolower($pegawai->status) !== 'dosen') {
            return back()->with('error', 'Hanya dosen yang bisa membuka kelas.');
        }

        $response = Http::withToken(config('services.tokens.pegawai_service'))
            ->post(config('services.urls.admin_service') . '/api/presensi/pertemuan', [
                'id_kelas_mk' => $request->id_kelas_mk,
                'id_pegawai' => $pegawai->id,
                'tanggal' => $request->tanggal,
                'pertemuan_ke' => $request->pertemuan_ke,
            ]);

        if ($response->successful()) {
            $idPresensiDosen = $response->json('id_presensi_dsn');
            return redirect()->route('dosen.presensi.rekap', $idPresensiDosen)
                ->with('success', 'Pertemuan berhasil dibuat.');
        }

        return back()->with('error', 'Gagal membuka presensi: ' . $response->json('message'));
    }

    public function rekapPresensi($id_presensi_dsn)
    {
        $response = Http::withToken(config('services.tokens.pegawai_service'))
            ->get(config('services.urls.admin_service') . "/api/presensi/{$id_presensi_dsn}");

        if ($response->successful()) {
            $rekap = $response->json();
            return view('dosen.presensi.rekap', compact('rekap'));
        }

        return back()->with('error', 'Gagal mengambil data presensi.');
    }

    public function updatePresensi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:H,S,I,A',
        ]);

        $response = Http::withToken(config('services.tokens.pegawai_service'))
            ->put(config('services.urls.admin_service') . "/api/presensi/update/{$id}", [
                'status' => $request->status,
            ]);

        if ($response->successful()) {
            return back()->with('message', 'Presensi berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal mengupdate presensi.');
    }
}
