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
    .dashboard-header small {
        color: #e3e3e3;
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
    .jadwal-box {
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 18px 24px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 18px;
    }
    .jadwal-box .icon {
        font-size: 2rem;
        color: #1565c0;
        margin-right: 12px;
    }
    .jadwal-box .date-box {
        background: #f5f5f5;
        border-radius: 6px;
        padding: 8px 18px;
        font-size: 1rem;
        margin-left: auto;
        font-weight: 500;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }
    .jadwal-section-title {
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 12px;
    }
    .card-jadwal {
        border-left: 5px solid #1565c0;
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border-radius: 8px;
        background: #fff;
    }
    .card-jadwal .badge {
        font-size: 0.95rem;
        font-weight: 500;
    }
    .card-jadwal .btn {
        min-width: 120px;
        margin-bottom: 4px;
    }
    .card-jadwal .btn-akhir {
        background: #bdbdbd;
        color: #fff;
        border: none;
    }
    .card-jadwal .btn-akhir:hover {
        background: #757575;
        color: #fff;
    }
    .sidebar-tanggungan {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 16px;
        min-width: 260px;
    }
    .sidebar-tanggungan .list-group-item {
        border: none;
        padding-left: 0;
        padding-right: 0;
        background: transparent;
    }
    .sidebar-tanggungan .btn {
        font-size: 0.95rem;
        padding: 2px 10px;
    }
    @media (max-width: 991px) {
        .sidebar-tanggungan {
            margin-top: 24px;
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
        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="jadwal-box mb-3">
                <div class="icon"><i class="bi bi-calendar-event"></i></div>
                <div>
                    <div style="font-weight:500;">Jadwal Mengajar Hari Ini</div>
                    <small>Anda memiliki 2 jadwal mengajar hari ini</small>
                </div>
                <div class="date-box">
                    Selasa, 29 April 2025
                </div>
            </div>

            <div class="jadwal-section-title mb-2">Jadwal Mengajar</div>
            <!-- Jadwal 1 -->
            <div class="card card-jadwal mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <strong>TEKNIK INFORMATIKA 4A (AX100)</strong>
                    </div>
                    <div>
                        <span class="badge bg-primary">Praktikum</span>
                        <span class="ms-2">3 SKS</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <i class="bi bi-clock"></i> <strong>Waktu</strong><br>
                        08.00 - 10.00
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-geo-alt"></i> <strong>Ruang</strong><br>
                        Gedung H
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-journal-bookmark"></i> <strong>Pertemuan ke-7</strong><br>
                        Praktikum
                    </div>
                    <div class="col-md-3 text-end">
                        <button class="btn btn-akhir btn-sm mb-1">Akhiri Kelas</button>
                        <button class="btn btn-primary btn-sm mb-1">Masuk Kelas</button>
                        <button class="btn btn-outline-primary btn-sm">Detail Kelas</button>
                    </div>
                </div>
            </div>
            <!-- Jadwal 2 -->
            <div class="card card-jadwal mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <strong>SISTEM INFORMASI KOTA CERDAS 4B</strong>
                    </div>
                    <div>
                        <span class="badge bg-secondary">Praktikum</span>
                        <span class="ms-2">2 SKS</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3">
                        <i class="bi bi-clock"></i> <strong>Waktu</strong><br>
                        02.30 - 04.30
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-geo-alt"></i> <strong>Ruang</strong><br>
                        Gedung H
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-journal-bookmark"></i> <strong>Pertemuan ke-7</strong><br>
                        Praktikum
                    </div>
                    <div class="col-md-3 text-end">
                        <button class="btn btn-akhir btn-sm mb-1">Akhiri Kelas</button>
                        <button class="btn btn-primary btn-sm mb-1">Masuk Kelas</button>
                        <button class="btn btn-outline-primary btn-sm">Detail Kelas</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="sidebar-tanggungan">
                <h6 class="mb-3">Tanggungan Anda</h6>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div style="font-weight:500;">Realisasi Perkuliahan</div>
                            <div style="font-size:0.95em;color:#888;">Anda belum mengisi realisasi perkuliahan hari ini</div>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div style="font-weight:500;">Presensi Mahasiswa</div>
                            <div style="font-size:0.95em;color:#888;">Anda belum mengisi presensi mahasiswa hari ini</div>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div style="font-weight:500;">Pengisian Nilai</div>
                            <div style="font-size:0.95em;color:#888;">Anda belum mengisi nilai mahasiswa hari ini</div>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection