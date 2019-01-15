<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSPovezivanje extends Migration
{

    public function up()
    {
        Schema::create('s_povezivanje', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tip', 75)->nullable();
            $table->string('brzina', 50)->nullable();
            $table->string('cena', 50)->nullable();
            $table->integer('lokacija_id')->unsigned();
            $table->integer('proizvodjac_id')->unsigned();
            $table->text('napomena')->nullable();

            $table->foreign('lokacija_id')->references('id')->on('s_lokacije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['lokacija_id', 'proizvodjac_id']);
        Schema::dropIfExists('s_povezivanje');
    }

}
