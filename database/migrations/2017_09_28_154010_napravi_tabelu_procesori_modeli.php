<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluProcesoriModeli extends Migration
{
    public function up()
    {
        Schema::create('procesori_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50);
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('soket_id')->unsigned();
            $table->integer('takt')->unsigned();
            $table->string('kes', 50);
            $table->integer('broj_jezgara');
            $table->integer('broj_niti');
            $table->integer('ocena')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('soket_id')->references('id')->on('s_soketi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['soket_id', 'proizvodjac_id']);
        Schema::dropIfExists('procesori_modeli');
    }
}
