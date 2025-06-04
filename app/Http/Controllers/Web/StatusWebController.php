<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusWebController extends Controller
{
    // Menampilkan semua data status
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }

    // Menampilkan form tambah status
    public function create()
    {
        return view('status.create');
    }

    // Menyimpan data status baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Status::create($request->all());

        return redirect()->route('status.index')->with('success', 'Status berhasil ditambahkan.');
    }

    // Menampilkan form edit status
    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    // Menyimpan perubahan data status
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $status->update($request->all());

        return redirect()->route('status.index')->with('success', 'Status berhasil diperbarui.');
    }

    // Menghapus data status
    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Status berhasil dihapus.');
    }
}
