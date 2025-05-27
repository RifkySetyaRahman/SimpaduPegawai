<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresensiPegawai extends Model
{
    protected $table = 'presensi_pegawai';
    protected $primaryKey = 'id_presensi';
    public $timestamps = false;

    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'waktu',
        'status_presensi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($presensi) {
            // Jika belum diisi, isi otomatis
            if (empty($presensi->tanggal)) {
                $presensi->tanggal = now()->toDateString(); // Format: Y-m-d
            }
            if (empty($presensi->waktu)) {
                $presensi->waktu = now()->toTimeString(); // Format: H:i:s
            }
        });
    }

    // Relasi: presensi milik pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
