<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PresensiPegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PresensiWebController extends Controller
{
    // Menampilkan semua data presensi
    public function index()
    {
        $presensi = PresensiPegawai::with('pegawai')->get();
        return view('presensi.index', compact('presensi'));
    }

    // Menampilkan form tambah presensi
    public function create()
    {
        $pegawaiList = Pegawai::all();
        return view('presensi.create', compact('pegawaiList'));
    }

    // Menyimpan presensi baru
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        PresensiPegawai::create($request->all());

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil ditambahkan.');
    }

    // Menampilkan form edit presensi
    public function edit(PresensiPegawai $presensi)
    {
        $pegawaiList = Pegawai::all();
        return view('presensi.edit', compact('presensi', 'pegawaiList'));
    }

    // Menyimpan perubahan presensi
    public function update(Request $request, PresensiPegawai $presensi)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        $presensi->update($request->all());

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil diperbarui.');
    }

    // Menghapus data presensi
    public function destroy(PresensiPegawai $presensi)
    {
        $presensi->delete();

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil dihapus.');
    }
}
