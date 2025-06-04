<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kokab;
use Illuminate\Http\Request;

class KokabWebController extends Controller
{
    // Tampilkan semua data kokab
    public function index()
    {
        $kokab = Kokab::all();
        return view('kokab.index', compact('kokab'));
    }

    // Tampilkan form tambah kokab
    public function create()
    {
        return view('kokab.create');
    }

    // Simpan data kokab baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kokab::create($request->all());

        return redirect()->route('kokab.index')->with('success', 'Data Kota/Kabupaten berhasil ditambahkan.');
    }

    // Tampilkan form edit kokab
    public function edit(Kokab $kokab)
    {
        return view('kokab.edit', compact('kokab'));
    }

    // Simpan perubahan data kokab
    public function update(Request $request, Kokab $kokab)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kokab->update($request->all());

        return redirect()->route('kokab.index')->with('success', 'Data Kota/Kabupaten berhasil diperbarui.');
    }

    // Hapus data kokab
    public function destroy(Kokab $kokab)
    {
        $kokab->delete();

        return redirect()->route('kokab.index')->with('success', 'Data Kota/Kabupaten berhasil dihapus.');
    }
}
