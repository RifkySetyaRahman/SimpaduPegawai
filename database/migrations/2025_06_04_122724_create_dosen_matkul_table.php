<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenMatakuliahTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_matakuliah');
    }
}
