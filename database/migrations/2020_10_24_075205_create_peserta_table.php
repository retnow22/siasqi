<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $defstatus = "Aktif";
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
            $table->string('semester_masuk')->nullable();
            $table->string('status')->default($defstatus);
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
        Schema::dropIfExists('peserta');
    }
}
