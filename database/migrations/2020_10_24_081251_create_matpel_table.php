<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatpelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matpel', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->string('semester');
            $table->string('hari');
            $table->string('waktu');
            $table->integer('level');
            $table->integer('kuota');
            $table->integer('pengajar_id')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->longText('evaluasi')->nullable();
            $table->string('grup')->nullable();
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
        Schema::dropIfExists('matpel');
    }
}
