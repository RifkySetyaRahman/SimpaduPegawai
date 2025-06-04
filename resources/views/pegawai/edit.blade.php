@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}">
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-control">
                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                    <option value="{{ $agama }}" {{ $pegawai->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $pegawai->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ $pegawai->nomor_telepon }}">
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="laki-laki" {{ $pegawai->jk == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $pegawai->jk == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Tambahkan dropdown status, kokab, dan provinsi jika diperlukan --}}

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
