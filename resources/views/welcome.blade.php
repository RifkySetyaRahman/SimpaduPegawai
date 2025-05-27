@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Selamat Datang di Sistem Pegawai</h1>
    <div class="mt-4">
        <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Manajemen Pegawai</a>
        <a href="{{ route('presensi.index') }}" class="btn btn-success">Presensi Pegawai</a>
        <a href="{{ route('status.index') }}" class="btn btn-secondary">Status Pegawai</a>
        <a href="{{ route('kokab.index') }}" class="btn btn-warning">Data Kota/Kabupaten</a>
        <a href="{{ route('provinsi.index') }}" class="btn btn-info">Data Provinsi</a>
    </div>
</div>
@endsection
