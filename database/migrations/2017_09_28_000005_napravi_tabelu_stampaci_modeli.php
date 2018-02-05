<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluStampaciModeli extends Migration
{

    public function up()
    {
        Schema::create('stampaci_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->integer('tip_tonera_id')->unsigned();
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('tip_stampaca_id')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tip_tonera_id')->references('id')->on('s_toneri')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tip_stampaca_id')->references('id')->on('s_tipovi_stampaca')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'proizvodjac_id',
            'toner_id',
            'tip_stampaca_id']);
        Schema::dropIfExists('stampaci_modeli');
    }

}
