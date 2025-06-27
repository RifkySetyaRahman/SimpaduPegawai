@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Pegawai</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>ID Pegawai:</strong> {{ $pegawai->id_pegawai }}</p>
            <p><strong>Nama:</strong> {{ $pegawai->nama_pegawai }}</p>
            <p><strong>Agama:</strong> {{ $pegawai->agama }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $pegawai->jk }}</p>
            <p><strong>Alamat:</strong> {{ $pegawai->alamat }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $pegawai->nomor_telepon }}</p>

            <p><strong>Status:</strong> {{ $pegawai->status->nama_status ?? '-' }}</p>
            <p><strong>Kota/Kabupaten:</strong> {{ $pegawai->kokab->nama_kokab ?? '-' }}</p>
            <p><strong>Provinsi:</strong> {{ $pegawai->provinsi->nama_provinsi ?? '-' }}</p>

            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
