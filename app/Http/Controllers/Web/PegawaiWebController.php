<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Status;
use App\Models\Kokab;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PegawaiWebController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with(['status', 'kokab', 'provinsi'])->get();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $statusList = Status::all();
        $kokabList = Kokab::all();
        $provinsiList = Provinsi::all();
        return view('pegawai.create', compact('statusList', 'kokabList', 'provinsiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|string|unique:pegawai,id_pegawai',
            'nama_pegawai' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'status_id' => 'required|exists:status,id',
            'kokab_id' => 'required|exists:kokab,id',
            'provinsi_id' => 'required|exists:provinsi,id',
        ]);

       Pegawai::create([
    'id_pegawai'   => $request->id_pegawai,
    'nama_pegawai' => $request->nama_pegawai,
    'agama'        => $request->agama,
    'id_status'    => $request->status_id,
    'id_kokab'     => $request->kokab_id,
    'id_provinsi'  => $request->provinsi_id,  
]);


        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        $statusList = Status::all();
        $kokabList = Kokab::all();
        $provinsiList = Provinsi::all();
        return view('pegawai.edit', compact('pegawai', 'statusList', 'kokabList', 'provinsiList'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'id_pegawai' => 'required|string|unique:pegawai,id_pegawai,' . $pegawai->id,
            'nama_pegawai' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'status_id' => 'required|exists:status,id',
            'kokab_id' => 'required|exists:kokab,id',
            'provinsi_id' => 'required|exists:provinsi,id',
        ]);

        $pegawai->update([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'agama' => $request->agama,
            'status_id' => $request->status_id,
            'kokab_id' => $request->kokab_id,
            'provinsi_id' => $request->provinsi_id,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    public function show(Pegawai $pegawai)
{
    return view('pegawai.show', compact('pegawai'));
}
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
