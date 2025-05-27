<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        return Provinsi::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_provinsi' => 'required|string|max:100',
        ]);

        return Provinsi::create($validated);
    }

    public function show($id)
    {
        return Provinsi::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);

        $validated = $request->validate([
            'nama_provinsi' => 'sometimes|required|string|max:100',
        ]);

        $provinsi->update($validated);

        return $provinsi;
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        return response()->json(['message' => 'Provinsi berhasil dihapus']);
    }
}
