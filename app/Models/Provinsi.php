<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id_provinsi';
    public $timestamps = false;

    protected $fillable = [
        'nama_provinsi'
    ];
    // Relasi: satu provinsi memiliki banyak pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_provinsi', 'id_provinsi');
    }

    // Relasi: satu provinsi memiliki banyak kokab
    public function kokab()
    {
        return $this->hasMany(Kokab::class, 'id_provinsi', 'id_provinsi');
    }
}
