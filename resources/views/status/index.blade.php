@extends('layouts.app')

@section('content')
<h2>Daftar Status Pegawai</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($status as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->nama_status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection