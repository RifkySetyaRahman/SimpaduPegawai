<?php

// app/Models/Status.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status'; // ← tambahkan ini
    protected $primaryKey = 'id_status'; // ← sesuaikan dengan migrasi jika tidak pakai "id"
    public $timestamps = false; // ← jika tidak menggunakan created_at & updated_at

    protected $fillable = [
        'nama_status'
    ];
    // Relasi
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_status', 'id_status');
    }
}
