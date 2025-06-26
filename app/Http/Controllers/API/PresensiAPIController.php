<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class PresensiAPIController extends Controller
{
    public function buatPresensiPertemuan(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|integer',
            'dosen_id' => 'required|integer',
            'tanggal' => 'required|date'
        ]);

        // Kirim ke service admin untuk membuat pertemuan (presensi_dosen)
        $res = Http::post('http://ti054e01.admin.local/api/presensi/pertemuan', [
            'kelas_id' => $request->kelas_id,
            'dosen_id' => $request->dosen_id,
            'tanggal' => $request->tanggal
        ]);

        return response()->json($res->json(), $res->status());
    }
}
