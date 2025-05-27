<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi_pegawai', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->foreignId('id_pegawai')
      ->constrained(table: 'pegawai', column: 'id_pegawai')
      ->onDelete('restrict');
            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('status_presensi', ['Hadir', 'Izin', 'Sakit', 'Alpa'])->default('Hadir');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_pegawais');
    }
};
