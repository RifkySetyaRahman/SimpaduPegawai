<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Status;

class StatusWebController extends Controller
{
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }
}
