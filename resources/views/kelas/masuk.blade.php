@extends('layouts.app')

@section('content')
<style>
    .dashboard-header {
        background: linear-gradient(90deg, #1565c0 80%, #fff 100%);
        color: #fff;
        padding: 24px 32px 16px 32px;
        border-radius: 8px 8px 0 0;
        margin-bottom: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .dashboard-header h2 {
        margin-bottom: 0;
        font-weight: bold;
        font-size: 2rem;
    }
    .nav-dashboard {
        background: #1565c0;
        border-radius: 0 0 8px 8px;
        margin-bottom: 24px;
    }
    .nav-dashboard .nav-link {
        color: #fff !important;
        font-weight: 500;
    }
    .nav-dashboard .dropdown-menu {
        background: #1565c0;
        color: #fff;
    }
    .sidebar-menu {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 16px 0;
        height: 100%;
        min-height: 480px;
    }
    .sidebar-menu .nav-link {
        color: #1565c0;
        font-weight: 500;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        border-radius: 4px;
        padding: 8px 16px;
        transition: background 0.2s;
    }
    .sidebar-menu .nav-link.active, .sidebar-menu .nav-link:hover {
        background: #e3f0ff;
        color: #0d47a1;
    }
    .sidebar-menu .nav-link i {
        margin-right: 8px;
    }
    .kelas-info-box {
        background: #e3f0ff;
        border: 2px solid #2196f3;
        border-radius: 4px;
        padding: 14px 18px;
        margin-bottom: 18px;
        font-size: 1rem;
    }
    .kelas-info-box .row > div {
        margin-bottom: 6px;
    }
    .kelas-detail-title {
        font-weight: bold;
        border-bottom: 3px solid #222;
        margin-bottom: 16px;
        margin-top: 24px;
        padding-bottom: 4px;
        font-size: 1.1rem;
    }
    .kelas-form label {
        font-weight: 500;
    }
    .kelas-form input, .kelas-form textarea {
        font-size: 0.95rem;
        background: #fafbfc;
    }
    .kelas-form .form-group {
        margin-bottom: 12px;
    }
    .kelas-form .btn {
        min-width: 90px;
        margin-right: 6px;
    }
    .btn-edit {
        background: #ff9800;
        color: #fff;
        border: none;
    }
    .btn-edit:hover {
        background: #fb8c00;
        color: #fff;
    }
    .btn-reset {
        background: #f44336;
        color: #fff;
        border: none;
    }
    .btn-reset:hover {
        background: #d32f2f;
        color: #fff;
    }
    @media (max-width: 991px) {
        .sidebar-menu {
            min-height: unset;
            margin-bottom: 16px;
        }
    }
</style>

<div class="dashboard-header">
    <h2>POLITEKNIK NEGERI BANJARMASIN</h2>
    <div>Hallo, Muhammad Saufi - Dosen</div>
</div>

<nav class="navbar navbar-expand-lg nav-dashboard mb-4">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Bimbingan</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Bimbingan 1</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Jadwal</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Jadwal Mengajar</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Perkuliahan</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Perkuliahan 1</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Laporan</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Laporan 1</a></li>
                </ul>
            </li>
        </ul>
        <span class="ms-auto">
            <i class="bi bi-search" style="font-size: 1.5rem; color: #fff;"></i>
        </span>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 mb-3">
            <div class="sidebar-menu">
                <a href="#" class="nav-link active"><i class="bi bi-journal-bookmark"></i> Jadwal Perkuliahan</a>
                <a href="#" class="nav-link"><i class="bi bi-people"></i> Peserta Kelas</a>
                <a href="#" class="nav-link"><i class="bi bi-person-check"></i> Presensi Kelas</a>
                <a href="#" class="nav-link"><i class="bi bi-card-checklist"></i> Nilai Perkuliahan</a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-10">
            <a href="#" class="btn btn-link mb-2">&larr; Kembali ke menu</a>
            <div class="kelas-info-box mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <div><strong>Program Studi</strong></div>
                        <div>D3 - Teknik Informatika</div>
                        <div><strong>Mata Kuliah</strong></div>
                        <div>Administrasi Database</div>
                        <div><strong>Kurikulum</strong></div>
                        <div>2020</div>
                        <div><strong>Kapasitas</strong></div>
                        <div>30</div>
                    </div>
                    <div class="col-md-4">
                        <div><strong>Periode</strong></div>
                        <div>2025 Ganjil</div>
                        <div><strong>Nama Kelas</strong></div>
                        <div>4E AXIOO</div>
                        <div><strong>Sistem Kuliah</strong></div>
                        <div>Reguler</div>
                    </div>
                </div>
            </div>

            <div class="kelas-detail-title">Detail Kelas</div>
            <form class="kelas-form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sesi</label>
                            <input type="text" class="form-control" name="sesi">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Jadwal</label>
                            <input type="date" class="form-control" name="tanggal_jadwal">
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="time" class="form-control" name="waktu_selesai">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pertemuan</label>
                            <input type="text" class="form-control" name="jenis_pertemuan">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Metode</label>
                            <input type="text" class="form-control" name="metode">
                        </div>
                        <div class="form-group">
                            <label>Ruang Kuliah</label>
                            <input type="text" class="form-control" name="ruang_kuliah">
                        </div>
                        <div class="form-group">
                            <label>Keterangan Ruang Kuliah</label>
                            <input type="text" class="form-control" name="keterangan_ruang">
                        </div>
                        <div class="form-group">
                            <label>URL Kuliah Online</label>
                            <input type="text" class="form-control" name="url_kuliah">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status2">
                        </div>
                    </div>
                </div>
                <div class="mt-3 mb-2 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                    <button type="button" class="btn btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                    <button type="reset" class="btn btn-reset"><i class="bi bi-x-circle"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection