@extends('layouts.app')

@section('content')
<h2>Daftar Presensi Pegawai</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nama Pegawai</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($presensi as $p)
        <tr>
            <td>{{ $p->pegawai->nama_pegawai ?? '-' }}</td>
            <td>{{ $p->tanggal }}</td>
            <td>{{ $p->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection