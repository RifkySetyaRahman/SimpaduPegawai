<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_status' => 'required|string|max:100',
        ]);

        return Status::create($validated);
    }

    public function show($id)
    {
        return Status::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $validated = $request->validate([
            'nama_status' => 'sometimes|required|string|max:100',
        ]);

        $status->update($validated);

        return $status;
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json(['message' => 'Status berhasil dihapus']);
    }
}
