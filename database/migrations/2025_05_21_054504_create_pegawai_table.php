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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai', 50);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->foreignId('id_status')
      ->constrained(table: 'status', column: 'id_status')
      ->onDelete('restrict');
      $table->foreignId('id_kokab')
      ->constrained(table: 'kokab', column: 'id_kokab')
      ->onDelete('restrict');
            $table->string('alamat', 100);
            $table->string('nomor_telepon', 15);
            $table->foreignId('id_provinsi')
      ->constrained(table: 'provinsi', column: 'id_provinsi')
      ->onDelete('restrict');
            $table->enum('jk', ['laki-laki','perempuan']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
