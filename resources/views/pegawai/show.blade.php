@extends('layouts.app')

@section('content')
    <h1>Detail Pegawai</h1>

    <p><strong>Nama:</strong> {{ $pegawai->nama_pegawai }}</p>
    <p><strong>Agama:</strong> {{ $pegawai->agama }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $pegawai->jk }}</p>

    <a href="{{ route('pegawai.index') }}">Kembali</a>
@endsection
