<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluLicence extends Migration
{

    public function up()
    {
        Schema::create('licence', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tip_licence', 50);
            $table->string('proizvod', 200);
            $table->string('kljuc')->nullable();
            $table->integer('broj_aktivacija')->unsigned()->nullable();
            $table->date('datum_pocetka_vazenja');
            $table->date('datum_prestanka_vazenja');
            $table->text('napomena')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('licence');
    }

}
