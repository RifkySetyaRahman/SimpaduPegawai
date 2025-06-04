<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KoKab;
use Illuminate\Http\Request;
use App\Http\Resources\KoKabResource;

class KoKabController extends Controller
{
    public function index()
    {
        return KoKab::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kokab' => 'required|string|max:100',
            'id_provinsi' => 'required|exists:provinsi,id_provinsi',
        ]);

        return KoKab::create($validated);
    }

    public function show($id)
    {
        return KoKab::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $KoKab = KoKab::findOrFail($id);

        $validated = $request->validate([
            'nama_KoKab' => 'sometimes|required|string|max:100',
            'id_provinsi' => 'sometimes|required|exists:provinsi,id_provinsi',
        ]);

        $KoKab->update($validated);

        return $KoKab;
    }

    public function destroy($id)
    {
        $KoKab = KoKab::findOrFail($id);
        $KoKab->delete();

        return response()->json(['message' => 'KoKab berhasil dihapus']);
    }
}
