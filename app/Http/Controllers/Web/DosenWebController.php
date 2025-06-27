<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DosenMatakuliah;
use Illuminate\Support\Facades\Http;

class DosenWebController extends Controller
{
    // Menampilkan semua relasi dosen-matakuliah
    public function index()
    {
        $relasi = DosenMatakuliah::all();

        // Ambil detail matakuliah dari service prodi
        $matakuliahDetails = [];

        foreach ($relasi as $r) {
            $res = Http::get("https://service-prodi.example.com/api/matakuliah/{$r->matakuliah_id}");

            $matakuliahDetails[] = [
                'id' => $r->id,
                'dosen_id' => $r->dosen_id,
                'matakuliah_id' => $r->matakuliah_id,
                'matakuliah_detail' => $res->successful() ? $res->json() : null,
            ];
        }

        return view('dosen.index', compact('matakuliahDetails'));
    }

    // Form untuk menambahkan relasi
    public function create()
    {
        return view('dosen.create');
    }

    // Simpan relasi baru
    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'matakuliah_id' => 'required|integer',
        ]);

        DosenMatakuliah::create($request->only(['dosen_id', 'matakuliah_id']));

        return redirect()->route('dosen.matakuliah.index')->with('success', 'Relasi berhasil ditambahkan.');
    }

    // Hapus relasi
    public function destroy($id)
    {
        $relasi = DosenMatakuliah::findOrFail($id);
        $relasi->delete();

        return redirect()->route('dosen.matakuliah.index')->with('success', 'Relasi berhasil dihapus.');
    }
}
