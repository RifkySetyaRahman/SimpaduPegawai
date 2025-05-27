<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;

class ProvinsiWebController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }
}
