@extends('layouts.app')

@section('content')
<h2>Daftar Kota/Kabupaten</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kota/Kabupaten</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kokab as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->nama_kokab }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection