<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kokab extends Model
{
    protected $table = 'kokab';
    protected $primaryKey = 'id_kokab';
    public $timestamps = false;

    protected $fillable = [
        'id_kokab',
        'nama_kokab',
        'id_provinsi'
    ];
    // Relasi: kabupaten/kota milik provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }

    // Relasi: satu kokab memiliki banyak pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_kokab', 'id_kokab');
    }
}
