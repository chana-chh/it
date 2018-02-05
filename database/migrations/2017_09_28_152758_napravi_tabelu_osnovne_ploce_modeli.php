<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOsnovnePloceModeli extends Migration
{
    public function up()
    {
        Schema::create('osnovne_ploce_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('cipset');
            $table->integer('tip_memorije_id')->unsigned();
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('soket_id')->unsigned();
            $table->boolean('usb_tri')->default(0);
            $table->boolean('integrisana_grafika')->default(1);
            $table->integer('ocena')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('soket_id')->references('id')->on('s_soketi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tip_memorije_id')->references('id')->on('s_tipovi_memorije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['soket_id', 'tip_memorije_id', 'proizvodjac_id']);
        Schema::dropIfExists('osnovne_ploce_modeli');
    }
}
