<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kokab;

class KokabWebController extends Controller
{
    public function index()
    {
        $kokab = Kokab::all();
        return view('kokab.index', compact('kokab'));
    }
}
