<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyPegawaiController extends Controller
{
    protected $baseUrl = 'http://ti054e01.pegawai.local/api';

    // === Dosen ===
    public function getDosen() {
        return Http::get("$this->baseUrl/dosen")->json();
    }

    public function storeDosen(Request $request) {
        return Http::post("$this->baseUrl/dosen", $request->all())->json();
    }

    public function updateDosen(Request $request, $id) {
        return Http::put("$this->baseUrl/dosen/$id", $request->all())->json();
    }

    // === Pegawai ===
    public function getPegawai() {
        return Http::get("$this->baseUrl/pegawai")->json();
    }

    public function storePegawai(Request $request) {
        return Http::post("$this->baseUrl/pegawai", $request->all())->json();
    }

    public function updatePegawai(Request $request, $id) {
        return Http::put("$this->baseUrl/pegawai/$id", $request->all())->json();
    }

    // === Presensi Pegawai ===
    public function getPresensiPegawai() {
        return Http::get("$this->baseUrl/presensipegawai")->json();
    }

    public function storePresensiPegawai(Request $request) {
        return Http::post("$this->baseUrl/presensipegawai", $request->all())->json();
    }

    public function updatePresensiPegawai(Request $request, $id) {
        return Http::put("$this->baseUrl/presensipegawai/$id", $request->all())->json();
    }

    // === Status ===
    public function getStatus() {
        return Http::get("$this->baseUrl/status")->json();
    }

    public function storeStatus(Request $request) {
        return Http::post("$this->baseUrl/status", $request->all())->json();
    }

    public function updateStatus(Request $request, $id) {
        return Http::put("$this->baseUrl/status/$id", $request->all())->json();
    }

    // === Provinsi ===
    public function getProvinsi() {
        return Http::get("$this->baseUrl/provinsi")->json();
    }

    public function storeProvinsi(Request $request) {
        return Http::post("$this->baseUrl/provinsi", $request->all())->json();
    }

    public function updateProvinsi(Request $request, $id) {
        return Http::put("$this->baseUrl/provinsi/$id", $request->all())->json();
    }

    // === Kota/Kabupaten ===
    public function getKokab() {
        return Http::get("$this->baseUrl/kokab")->json();
    }

    public function storeKokab(Request $request) {
        return Http::post("$this->baseUrl/kokab", $request->all())->json();
    }

    public function updateKokab(Request $request, $id) {
        return Http::put("$this->baseUrl/kokab/$id", $request->all())->json();
    }
}
