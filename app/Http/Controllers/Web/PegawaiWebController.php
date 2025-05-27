<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;

class PegawaiWebController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with(['status', 'kokab', 'provinsi'])->get();
        return view('pegawai.index', compact('pegawai'));
    }
}
