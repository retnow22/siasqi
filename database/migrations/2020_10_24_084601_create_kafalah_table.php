<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKafalahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafalah', function (Blueprint $table) {
            $table->id();            
            $table->string('semester');
            $table->integer('pengajar_id');
            $table->integer('jumlah_mengajar');
            $table->integer('badal')->nullable();
            $table->integer('nominal');
            $table->integer('total_pembayaran');
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
        Schema::dropIfExists('kafalah');
    }
}
