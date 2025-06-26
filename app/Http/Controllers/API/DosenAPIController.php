<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DosenMatakuliah;

class DosenAPIController extends Controller
{
    public function matakuliahByDosen($dosen_id)
    {
       $matkulIds = DosenMatakuliah::where('dosen_id', $dosen_id)->pluck('matakuliah_id');


        $matkulDetails = collect();

        foreach ($matkulIds as $id) {
            $res = Http::get("https://service-prodi.example.com/api/matakuliah/{$id}");
            if ($res->successful()) {
                $matkulDetails->push($res->json());
            }
        }

        return response()->json($matkulDetails);
    }

    public function addRelasi(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|integer',
            'matakuliah_id' => 'required|integer',
        ]);

        $relasi = DosenMatakuliah::create($request->all());

        return response()->json([
            'message' => 'Relasi dosen dan matakuliah berhasil ditambahkan',
            'data' => $relasi
        ]);
    }
}
