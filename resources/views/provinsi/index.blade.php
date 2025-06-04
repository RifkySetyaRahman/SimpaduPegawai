@extends('layouts.app')

@section('content')
<h2>Daftar Provinsi</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Provinsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($provinsi as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nama_provinsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection