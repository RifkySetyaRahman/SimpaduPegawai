@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Data Pegawai</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf

        <!-- id_pegawai -->
        <div class="form-group mb-3">
            <label for="id_pegawai">ID Pegawai</label>
            <input type="text" name="id_pegawai" class="form-control" required>
        </div>

        <!-- nama_pegawai -->
        <div class="form-group mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" required>
        </div>

        <!-- agama -->
        <div class="form-group mb-3">
            <label for="agama">Agama</label>
            <input type="text" name="agama" class="form-control" required>
        </div>

        <!-- id_status -->
        <div class="form-group mb-3">
            <label for="status_id">Status</label>
            <select name="status_id" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                @foreach ($statusList as $status)
                    <option value="{{ $status->id_status }}">{{ $status->nama_status }}</option>
                @endforeach
            </select>
        </div>

        <!-- id_kokab -->
        <div class="form-group mb-3">
            <label for="kokab_id">Kabupaten/Kota</label>
            <select name="kokab_id" class="form-control" required>
                <option value="">-- Pilih Kota/Kabupaten --</option>
                @foreach ($kokabList as $kokab)
                    <option value="{{ $kokab->id_kokab }}">{{ $kokab->nama_kokab }}</option>
                @endforeach
            </select>
        </div>

        <!-- alamat -->
        <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <!-- nomor_telepon -->
        <div class="form-group mb-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" required>
        </div>

        <!-- id_provinsi -->
        <div class="form-group mb-3">
            <label for="provinsi_id">Provinsi</label>
            <select name="provinsi_id" class="form-control" required>
                <option value="">-- Pilih Provinsi --</option>
                @foreach ($provinsiList as $provinsi)
                    <option value="{{ $provinsi->id_provinsi }}">{{ $provinsi->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>

        <!-- jk -->
        <div class="form-group mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <!-- submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
