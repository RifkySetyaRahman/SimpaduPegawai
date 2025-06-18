<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\PresensiDosen;
use App\Models\KelasMahasiswa;

class PresensiWebController extends Controller
{
    public function index()
    {
        $pertemuan = PresensiDosen::with('kelas', 'dosen')->latest()->get();
        return view('admin.presensi.index', compact('pertemuan'));
    }

    public function show($id_presensi_dsn)
    {
        $presensiMahasiswa = Presensi::with(['kelasMahasiswa.mahasiswa'])
            ->where('id_presensi_dsn', $id_presensi_dsn)
            ->get();

        $presensiDosen = PresensiDosen::with(['kelas', 'dosen'])->findOrFail($id_presensi_dsn);

        return view('admin.presensi.show', compact('presensiMahasiswa', 'presensiDosen'));
    }

    public function rekapKelas($kelas_id)
    {
        $pertemuan = PresensiDosen::where('kelas_id', $kelas_id)->get();
        return view('admin.presensi.rekap-kelas', compact('pertemuan'));
    }
}