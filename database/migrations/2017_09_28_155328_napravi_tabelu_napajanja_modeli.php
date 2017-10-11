<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluNapajanjaModeli extends Migration
{
    public function up()
    {
        Schema::create('napajanja_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('snaga', 30)->nullable();
            $table->integer('proizvodjac_id')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['proizvodjac_id']);
        Schema::dropIfExists('napajanja_modeli');
    }
}
