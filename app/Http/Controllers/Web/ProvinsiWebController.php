<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiWebController extends Controller
{
    // Tampilkan semua data provinsi
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }

    // Tampilkan form tambah provinsi
    public function create()
    {
        return view('provinsi.create');
    }

    // Simpan data provinsi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Provinsi::create($request->all());

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    // Tampilkan form edit provinsi
    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit', compact('provinsi'));
    }

    // Simpan perubahan provinsi
    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $provinsi->update($request->all());

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diperbarui.');
    }

    // Hapus data provinsi
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }
}
