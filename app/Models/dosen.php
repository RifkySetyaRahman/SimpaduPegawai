<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = 'dosen_matakuliah';

    protected $fillable = [
        'dosen_id',
        'matakuliah_id'
    ];
}
