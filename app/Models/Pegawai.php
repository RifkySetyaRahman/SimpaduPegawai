<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    public $timestamps = false;

    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'agama',
        'id_status',
        'id_kokab',
        'alamat',
        'nomor_telepon',
        'id_provinsi',
        'jk'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function kokab()
    {
        return $this->belongsTo(Kokab::class, 'id_kokab');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }

    public function presensi()
    {
        return $this->hasMany(PresensiPegawai::class, 'id_pegawai');
    }
}
