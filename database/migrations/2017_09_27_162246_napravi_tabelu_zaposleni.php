<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluZaposleni extends Migration
{

    public function up()
    {
        Schema::create('zaposleni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prezime', 100);
            $table->string('ime', 50);
            $table->integer('kancelarija_id')->unsigned();
            $table->integer('uprava_id')->unsigned();
            $table->string('radno_mesto')->nullable();
            $table->string('src')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('uprava_id')->references('id')->on('s_uprave')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['uprava_id', 'kancelarija_id']);
        Schema::dropIfExists('zaposleni');
    }

}
