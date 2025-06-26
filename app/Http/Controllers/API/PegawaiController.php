<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Resources\PegawaiResource;

class PegawaiController extends Controller
{
    // Ambil semua data pegawai + relasi
    public function index()
{
    // Ambil semua pegawai dengan relasi yang diperlukan
    $pegawais = Pegawai::with(['status', 'kokab', 'provinsi'])->get();

    $data = $pegawais->map(function ($pegawai) {
        return [
            'id' => $pegawai->id_pegawai,
            'nama' => $pegawai->nama_pegawai,
            'alamat' => $pegawai->alamat,
            'nomor_telepon' => $pegawai->nomor_telepon,
            'agama' => $pegawai->agama, // wajib ada
            'status' => optional($pegawai->status)->nama_status, // opsional
            'kabupaten' => $pegawai->kokab ? $pegawai->kokab->nama_kokab : null, // wajib ada
            'provinsi' => optional($pegawai->provinsi)->nama_provinsi, // opsional
            'jenis_kelamin' => $pegawai->jk, // wajib ada
        ];
    });

    return response()->json(['data' => $data]);
}


   public function store(Request $request)
{$request->validate([
    'id_pegawai'    => 'required|string|unique:pegawai,id_pegawai',
    'nama_pegawai'  => 'required|string|max:255',
    'agama'         => 'required|string|max:50',
    'jk'            => 'required|string|max:10',
    'id_status'     => 'required|exists:status,id_status',
    'id_kokab'      => 'required|exists:kokab,id_kokab',
    'id_provinsi'   => 'required|exists:provinsi,id_provinsi',
]);

Pegawai::create([
    'id_pegawai'   => $request->id_pegawai,
    'nama_pegawai' => $request->nama_pegawai,
    'agama'        => $request->agama,
    'jk'           => $request->jk,
    'id_status'    => $request->id_status,
    'id_kokab'     => $request->id_kokab,
    'id_provinsi'  => $request->id_provinsi,
]);

    return response()->json(['message' => 'Pegawai berhasil ditambahkan.']);
}


    // Ambil 1 data pegawai
    public function show($id)
{
    $pegawai = Pegawai::with(['status', 'kokab', 'provinsi'])->findOrFail($id);

    // Pastikan key wajib selalu ada, walaupun valuenya null
    $result = [
        'id' => $pegawai->id_pegawai,
        'nama' => $pegawai->nama_pegawai,
        'alamat' => $pegawai->alamat,
        'nomor_telepon' => $pegawai->nomor_telepon,
        'agama' => $pegawai->agama,  // wajib ada
        'status' => optional($pegawai->status)->nama_status, // opsional, boleh dihapus kalau null
        'kabupaten' => $pegawai->kokab ? $pegawai->kokab->nama_kokab : null, // wajib ada, null kalau gak ada
        'provinsi' => optional($pegawai->provinsi)->nama_provinsi, // opsional
        'jenis_kelamin' => $pegawai->jk, // wajib ada
    ];

    // Hanya hapus key opsional kalau null (status & provinsi)
    $filtered = collect($result)->reject(function ($value, $key) {
        return is_null($value) && in_array($key, ['status', 'provinsi']);
    })->all();

    return response()->json(['data' => $filtered]);
}

    // Update data pegawai
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama_pegawai'   => 'sometimes|required|string|max:50',
            'agama'          => 'sometimes|required|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'id_status'      => 'sometimes|required|exists:status,id_status',
            'id_kokab'       => 'sometimes|required|exists:kokab,id_kokab',
            'alamat'         => 'sometimes|required|string|max:100',
            'nomor_telepon'  => 'sometimes|required|string|max:15',
            'id_provinsi'    => 'sometimes|required|exists:provinsi,id_provinsi',
            'jk'             => 'sometimes|required|in:laki-laki,perempuan',
        ]);

        $pegawai->update($validated);

        return new PegawaiResource($pegawai);
    }

    // Hapus pegawai
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(['message' => 'Pegawai berhasil dihapus']);
    }
}
