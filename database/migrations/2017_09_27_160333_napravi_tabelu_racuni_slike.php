<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluRacuniSlike extends Migration
{
    public function up()
    {
        Schema::create('racuni_slike', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('racun_id')->unsigned();
            $table->string('src');

            $table->foreign('racun_id')->references('id')->on('racuni')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['racun_id']);
        Schema::dropIfExists('racuni_slike');
    }
}
