<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluHddModeli extends Migration
{
    public function up()
    {
        Schema::create('hdd_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('povezivanje_id')->unsigned();
            $table->integer('kapacitet')->unsigned();
            $table->boolean('ssd')->default(0);
            $table->integer('ocena')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('povezivanje_id')->references('id')->on('s_hdd_povezivanja')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['proizvodjac_id', 'povezivanje_id']);
        Schema::dropIfExists('hdd_modeli');
    }
}
