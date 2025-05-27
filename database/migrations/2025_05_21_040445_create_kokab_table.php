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
        Schema::create('kokab', function (Blueprint $table) {
            $table->id('id_kokab');
            $table->string('nama_kokab', 50);
            $table->foreignId('id_provinsi')
            ->constrained(table: 'provinsi', column: 'id_provinsi')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kokab');
    }
};
