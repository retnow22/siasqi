<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajar', function (Blueprint $table) {
            $value = "000000";
            $table->id();
            $table->string('nomor_induk');
            $table->string('nama');
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('instansi');
            $table->string('angkatan');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->integer('level');
            $table->string('kode_pengajar')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajar');
    }
}
