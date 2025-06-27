@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_pegawai">ID Pegawai</label>
            <input type="text" name="id_pegawai" class="form-control" value="{{ $pegawai->id_pegawai }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}" required>
        </div>

        <div class="mb-3">
            <label for="agama">Agama</label>
            <select name="agama" class="form-control" required>
                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                    <option value="{{ $agama }}" {{ $pegawai->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="laki-laki" {{ $pegawai->jk == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $pegawai->jk == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $pegawai->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ $pegawai->nomor_telepon }}" required>
        </div>

        <div class="mb-3">
            <label for="status_id">Status</label>
            <select name="status_id" class="form-control" required>
                @foreach ($statusList as $status)
                    <option value="{{ $status->id_status }}" {{ $pegawai->id_status == $status->id_status ? 'selected' : '' }}>
                        {{ $status->nama_status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kokab_id">Kota/Kabupaten</label>
            <select name="kokab_id" class="form-control" required>
                @foreach ($kokabList as $kokab)
                    <option value="{{ $kokab->id_kokab }}" {{ $pegawai->id_kokab == $kokab->id_kokab ? 'selected' : '' }}>
                        {{ $kokab->nama_kokab }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="provinsi_id">Provinsi</label>
            <select name="provinsi_id" class="form-control" required>
                @foreach ($provinsiList as $provinsi)
                    <option value="{{ $provinsi->id_provinsi }}" {{ $pegawai->id_provinsi == $provinsi->id_provinsi ? 'selected' : '' }}>
                        {{ $provinsi->nama_provinsi }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
