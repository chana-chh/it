<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluMemorijeModeli extends Migration
{

    public function up()
    {
        Schema::create('memorije_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('tip_memorije_id')->unsigned();
            $table->integer('brzina')->unsigned();
            $table->integer('kapacitet')->unsigned();
            $table->integer('ocena')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tip_memorije_id')->references('id')->on('s_tipovi_memorije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'proizvodjac_id',
            'tip_memorije_id']);
        Schema::dropIfExists('memorije_modeli');
    }

}
