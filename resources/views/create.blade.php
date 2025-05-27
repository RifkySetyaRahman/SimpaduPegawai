@extends('layouts.app')

@section('content')
    <h1>Tambah Pegawai</h1>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <label>Nama Pegawai:</label><br>
        <input type="text" name="nama_pegawai"><br>

        <label>Agama:</label><br>
        <input type="text" name="agama"><br>

        <label>Jenis Kelamin:</label><br>
        <select name="jk">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
@endsection
