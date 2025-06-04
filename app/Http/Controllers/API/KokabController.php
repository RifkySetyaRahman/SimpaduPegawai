<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kokab;
use Illuminate\Http\Request;
use App\Http\Resources\KokabResource;

class KokabController extends Controller
{
    public function index()
    {
        return Kokab::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kokab' => 'required|string|max:100',
            'id_provinsi' => 'required|exists:provinsi,id_provinsi',
        ]);

        return Kokab::create($validated);
    }

    public function show($id)
    {
        return Kokab::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $kokab = Kokab::findOrFail($id);

        $validated = $request->validate([
            'nama_kokab' => 'sometimes|required|string|max:100',
            'id_provinsi' => 'sometimes|required|exists:provinsi,id_provinsi',
        ]);

        $kokab->update($validated);

        return $kokab;
    }

    public function destroy($id)
    {
        $KoKab = KoKab::findOrFail($id);
        $KoKab->delete();

        return response()->json(['message' => 'KoKab berhasil dihapus']);
    }
}
