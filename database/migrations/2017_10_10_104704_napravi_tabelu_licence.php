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
            $table->string('proizvod', 50);
            $table->string('kljuc', 50)->nullable();
            $table->integer('broj_necega')->unsigned()->nullable();
            $table->date('datum_pocetka_vazenja');
            $table->date('datum_prestanka_vazenja');
        });
    }


    public function down()
    {
        Schema::dropIfExists('licence');
    }
}
