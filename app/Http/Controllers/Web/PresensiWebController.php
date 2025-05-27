<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PresensiPegawai;

class PresensiWebController extends Controller
{
    public function index()
    {
        $presensi = PresensiPegawai::with('pegawai')->get();
        return view('presensi.index', compact('presensi'));
    }
}
