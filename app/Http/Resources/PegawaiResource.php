<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id_pegawai,
            'nama' => $this->nama_pegawai,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon,
            'agama' => $this->agama->nama_agama ?? null,
            'status' => $this->status->nama_status ?? null,
            'kabupaten' => $this->kabupaten->nama_kabupaten ?? null,
            'provinsi' => $this->provinsi->nama_provinsi ?? null,
            'jenis_kelamin' => $this->jenisKelamin->nama_jenis_kelamin ?? null,
        ];
    }
}
