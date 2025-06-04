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
        display: flex;
        align-items: center;
    }
    .dashboard-header img {
        height: 56px;
        margin-right: 18px;
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
    .btn-back {
        background: #e3f0ff;
        color: #1565c0;
        border: none;
        font-weight: 500;
        border-radius: 4px;
        padding: 4px 14px;
        margin-bottom: 10px;
    }
    .presensi-header-row {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }
    .presensi-header-row .tanggal-box {
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 8px 18px;
        font-size: 1rem;
        margin-left: 18px;
        margin-right: auto;
        border: 1px solid #e0e0e0;
    }
    .presensi-header-row .btn-reset {
        color: #f44336;
        background: none;
        border: none;
        font-weight: 500;
        margin-right: 10px;
    }
    .presensi-header-row .btn-hadir {
        color: #388e3c;
        background: none;
        border: none;
        font-weight: 500;
    }
    .presensi-list {
        background: #f5f5f5;
        border-radius: 12px;
        padding: 18px 0 0 0;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .presensi-item {
        background: #fff;
        border-radius: 8px;
        margin: 0 18px 12px 18px;
        padding: 16px 0 16px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 1px 4px rgba(0,0,0,0.03);
        border-bottom: 1px solid #e0e0e0;
    }
    .presensi-item:last-child {
        border-bottom: none;
    }
    .presensi-nama {
        font-size: 1.08rem;
        font-weight: 500;
        margin-bottom: 2px;
    }
    .presensi-nim {
        font-size: 0.98rem;
        color: #666;
    }
    .presensi-status-group {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-right: 24px;
    }
    .presensi-status-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: none;
        font-weight: bold;
        font-size: 1.1rem;
        background: #e0e0e0;
        color: #222;
        transition: background 0.2s, color 0.2s;
        cursor: pointer;
    }
    .presensi-status-btn.active, .presensi-status-btn.hadir {
        background: #1565c0;
        color: #fff;
    }
    .presensi-status-btn.sakit { background: #ffb300; color: #fff; }
    .presensi-status-btn.izin { background: #43a047; color: #fff; }
    .presensi-status-btn.alpha { background: #e53935; color: #fff; }
    @media (max-width: 991px) {
        .sidebar-menu {
            min-height: unset;
            margin-bottom: 16px;
        }
        .presensi-list {
            margin: 0;
        }
        .presensi-item {
            margin: 0 4px 12px 4px;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        .presensi-status-group {
            margin-right: 0;
        }
    }
</style>

<div class="dashboard-header">
    <img src="{{ asset('images/poliban.png') }}" alt="Logo" />
    <div>
        <h2>POLITEKNIK NEGERI BANJARMASIN</h2>
        <div>Hallo, Muhammad Saufi - Dosen</div>
    </div>
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
            <a href="{{ url('/kelas/masuk') }}" class="nav-link"><i class="bi bi-journal-bookmark"></i> Jadwal Perkuliahan</a>
            <a href="{{ url('/kelas/pesertakelas') }}" class="nav-link"><i class="bi bi-people"></i> Peserta Kelas</a>
            <a href="{{ url('/kelas/presensikelas') }}" class="nav-link"><i class="bi bi-person-check"></i> Presensi Kelas</a>
            <a href="#" class="nav-link"><i class="bi bi-card-checklist"></i> Nilai Perkuliahan</a>
            <a href="#" class="nav-link"><i class="bi bi-person-badge"></i> Dosen Pengajar</a>
</div>
        </div>
        <!-- Main Content -->
        <div class="col-md-10">
            <button class="btn btn-back mb-2">&larr; Kembali ke menu</button>
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

            <div class="presensi-header-row mb-2">
                <div style="font-weight:500;">Pertemuan hari ini</div>
                <div class="tanggal-box ms-3">Selasa, 29 April 2025</div>
                <button class="btn-reset ms-3"><i class="bi bi-x-circle"></i> Reset</button>
                <button class="btn-hadir"><i class="bi bi-check-circle"></i> Tandai Semua Hadir</button>
            </div>

            <div class="presensi-list">
                <!-- Presensi Item -->
                <div class="presensi-item">
                    <div>
                        <div class="presensi-nama">Nayla Azzahra Kirana</div>
                        <div class="presensi-nim">B2310010</div>
                    </div>
                    <div class="presensi-status-group">
                        <button class="presensi-status-btn hadir active">H</button>
                        <button class="presensi-status-btn sakit">S</button>
                        <button class="presensi-status-btn izin">I</button>
                        <button class="presensi-status-btn alpha">A</button>
                    </div>
                </div>
                <div class="presensi-item">
                    <div>
                        <div class="presensi-nama">Rayyan Elvano Pratama</div>
                        <div class="presensi-nim">B2310011</div>
                    </div>
                    <div class="presensi-status-group">
                        <button class="presensi-status-btn hadir active">H</button>
                        <button class="presensi-status-btn sakit">S</button>
                        <button class="presensi-status-btn izin">I</button>
                        <button class="presensi-status-btn alpha">A</button>
                    </div>
                </div>
                <div class="presensi-item">
                    <div>
                        <div class="presensi-nama">Aurellia Salsabila Nadhifa</div>
                        <div class="presensi-nim">B2310012</div>
                    </div>
                    <div class="presensi-status-group">
                        <button class="presensi-status-btn hadir active">H</button>
                        <button class="presensi-status-btn sakit">S</button>
                        <button class="presensi-status-btn izin">I</button>
                        <button class="presensi-status-btn alpha">A</button>
                    </div>
                </div>
                <!-- Tambahkan peserta lain sesuai kebutuhan -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection