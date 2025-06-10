<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function masuk($kode_kelas)
    {
        // $kode_kelas bisa 'TI' atau 'SI'
        return view('kelas.masuk', ['kode_kelas' => $kode_kelas]);
    }
}