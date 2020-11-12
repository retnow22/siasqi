<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatpelPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matpel_peserta', function (Blueprint $table) {
            $table->id();
            $table->integer('matpel_id')->nullable();
            $table->integer('peserta_id')->nullable();
            $table->integer('nilai_lisan');
            $table->integer('nilai_teori')->nullable();
            $table->integer('nilai_akhir');
            $table->integer('kkm');
            $table->string('keterangan');
            $table->string('penguji');
            $table->string('pertemuan1')->nullable();
            $table->string('pertemuan2')->nullable();
            $table->string('pertemuan3')->nullable();
            $table->string('pertemuan4')->nullable();
            $table->string('pertemuan5')->nullable();
            $table->string('pertemuan6')->nullable();
            $table->string('pertemuan7')->nullable();
            $table->string('pertemuan8')->nullable();
            $table->string('pertemuan9')->nullable();
            $table->string('pertemuan10')->nullable();
            $table->string('pertemuan11')->nullable();
            $table->string('pertemuan12')->nullable();
            $table->longText('evaluasi')->nullable();
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
        Schema::dropIfExists('matpel_peserta');
    }
}
