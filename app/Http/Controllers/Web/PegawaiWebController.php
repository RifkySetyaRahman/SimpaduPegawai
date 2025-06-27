<?php

namespace app\Http\Controllers\Web;

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

<<<<<<< HEAD
   public function store(Request $request)
{
   $request->validate([
    'id_pegawai'    => 'required|string|unique:pegawai,id_pegawai',
    'nama_pegawai'  => 'required|string|max:255',
    'agama'         => 'required|string|max:50',
    'status_id'     => 'required|exists:status,id_status',   // ✅ yang benar
    'kokab_id'      => 'required|exists:kokab,id_kokab',     // ✅
    'provinsi_id'   => 'required|exists:provinsi,id_provinsi', // ✅
    'alamat'        => 'required|string|max:255',
    'nomor_telepon' => 'required|string|max:20',
    'jk'            => 'required|in:laki-laki,perempuan',
]);

=======
    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai'    => 'required|string|unique:pegawai,id_pegawai',
            'nama_pegawai'  => 'required|string|max:255',
            'agama'         => 'required|string|max:50',
            'jk'            => 'required|in:laki-laki,perempuan',
            'alamat'        => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'status_id'     => 'required|exists:status,id_status',
            'kokab_id'      => 'required|exists:kokab,id_kokab',
            'provinsi_id'   => 'required|exists:provinsi,id_provinsi',
        ]);
>>>>>>> 089f44e84586d05e9ee02a44a3e57a5d0cbc7ed3

        Pegawai::create([
            'id_pegawai'     => $request->id_pegawai,
            'nama_pegawai'   => $request->nama_pegawai,
            'agama'          => $request->agama,
            'jk'             => $request->jk,
            'alamat'         => $request->alamat,
            'nomor_telepon'  => $request->nomor_telepon,
            'id_status'      => $request->status_id,
            'id_kokab'       => $request->kokab_id,
            'id_provinsi'    => $request->provinsi_id,
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
<<<<<<< HEAD
    {
        $request->validate([
            'id_pegawai'   => 'required|string|unique:pegawai,id_pegawai,' . $pegawai->id_pegawai . ',id_pegawai',
            'nama_pegawai' => 'required|string|max:255',
            'agama'        => 'required|string|max:50',
            'jk'           => 'required|in:laki-laki,perempuan',
            'status_id'    => 'required|exists:status,id',
            'kokab_id'     => 'required|exists:kokab,id',
            'provinsi_id'  => 'required|exists:provinsi,id',
        ]);

        $pegawai->update([
            'id_pegawai'   => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'agama'        => $request->agama,
            'jk'           => $request->jk,
            'id_status'    => $request->status_id,
            'id_kokab'     => $request->kokab_id,
            'id_provinsi'  => $request->provinsi_id,
        ]);
=======
{
    $request->validate([
        'id_pegawai'   => 'required|string|unique:pegawai,id_pegawai,' . $pegawai->id_pegawai . ',id_pegawai',
        'nama_pegawai' => 'required|string|max:255',
        'agama'        => 'required|string|max:50',
        'jk'           => 'required|in:laki-laki,perempuan',
        'alamat'       => 'required|string|max:255',
        'nomor_telepon'=> 'required|string|max:20',
        'status_id'    => 'required|exists:status,id_status',
        'kokab_id'     => 'required|exists:kokab,id_kokab',
        'provinsi_id'  => 'required|exists:provinsi,id_provinsi',
    ]);

    $pegawai->update([
        'id_pegawai'     => $request->id_pegawai,
        'nama_pegawai'   => $request->nama_pegawai,
        'agama'          => $request->agama,
        'jk'             => $request->jk,
        'alamat'         => $request->alamat,
        'nomor_telepon'  => $request->nomor_telepon,
        'id_status'      => $request->status_id,
        'id_kokab'       => $request->kokab_id,
        'id_provinsi'    => $request->provinsi_id,
    ]);

    return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
}
>>>>>>> 089f44e84586d05e9ee02a44a3e57a5d0cbc7ed3


    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    public function destroy(Pegawai $pegawai)
    {
        // Hapus presensi terkait terlebih dahulu
        $pegawai->presensi()->delete();

        // Baru hapus pegawai
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
