@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pegawai</h2>
    <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">+ Tambah Pegawai</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Agama</th>
                <th>Status</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
            <tr>
                <td>{{ $p->nama_pegawai }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->status->nama_status }}</td>
                <td>{{ $p->provinsi->nama_provinsi }}</td>
                <td>{{ $p->kokab->nama_kokab }}</td>
                <td>
                    <a href="{{ route('pegawai.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
