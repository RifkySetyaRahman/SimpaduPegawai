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
    .btn-back {
        background: #e3f0ff;
        color: #1565c0;
        border: none;
        font-weight: 500;
        border-radius: 4px;
        padding: 4px 14px;
        margin-bottom: 10px;
    }
    .search-box {
        border: 2px solid #2196f3;
        border-radius: 4px;
        padding: 4px 12px;
        width: 320px;
        margin-bottom: 8px;
        outline: none;
    }
    .peserta-table-container {
        margin-top: 32px;
    }
    .peserta-table {
        width: 100%;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .peserta-table th {
        background: #f5f5f5;
        font-weight: 600;
        text-align: left;
        padding: 12px 18px;
        font-size: 1.05rem;
    }
    .peserta-table td {
        padding: 12px 18px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 1.02rem;
        background: #fafbfc;
    }
    .peserta-table tr:last-child td {
        border-bottom: none;
    }
    .detail-link {
        color: #2196f3;
        text-decoration: none;
        font-weight: 500;
    }
    .detail-link:hover {
        text-decoration: underline;
    }
    @media (max-width: 991px) {
        .sidebar-menu {
            min-height: unset;
            margin-bottom: 16px;
        }
        .peserta-table-container {
            margin-top: 16px;
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
                <a href="{{ url('/kelas/masuk') }}" class="nav-link"><i class="bi bi-journal-bookmark"></i> Jadwal Perkuliahan</a>
                <a href="#" class="nav-link active"><i class="bi bi-people"></i> Peserta Kelas</a>
                <a href="{{ url('/kelas/presensikelas') }}" class="nav-link"><i class="bi bi-person-check"></i> Presensi Kelas</a>
                <a href="#" class="nav-link"><i class="bi bi-card-checklist"></i> Nilai Perkuliahan</a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-10">
            <a href="{{ route('dashboard') }}" class="btn btn-link mb-2">&larr; Kembali ke menu</a>
            <div class="mb-2">
                <input type="text" class="search-box" placeholder="&#128269;  NIM/ Nama Mahasiswa">
            </div>
            <hr style="margin-top: 0;">
            <div class="peserta-table-container">
                <table class="peserta-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nayla Azzahra Kirana</td>
                            <td>B2310010</td>
                            <td><a href="#" class="detail-link">[Lihat Detail Mahasiswa]</a></td>
                        </tr>
                        <tr>
                            <td>Rayyan Elvano Pratama</td>
                            <td>B2310011</td>
                            <td><a href="#" class="detail-link">[Lihat Detail Mahasiswa]</a></td>
                        </tr>
                        <tr>
                            <td>Aurellia Salsabila Nadhifa</td>
                            <td>B2310012</td>
                            <td><a href="#" class="detail-link">[Lihat Detail Mahasiswa]</a></td>
                        </tr>
                        <tr>
                            <td>Zidan Alfarez Mahendra</td>
                            <td>B2310013</td>
                            <td><a href="#" class="detail-link">[Lihat Detail Mahasiswa]</a></td>
                        </tr>
                        <tr>
                            <td>Khalva Melisva Anindya</td>
                            <td>B2310014</td>
                            <td><a href="#" class="detail-link">[Lihat Detail Mahasiswa]</a></td>
                        </tr>
                        <!-- Tambahkan data lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection