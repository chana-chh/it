<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluServis extends Migration
{

    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('broj_prijave');
            $table->integer('zaposleni_id')->unsigned();
            $table->integer('kancelarija_id')->unsigned();
            $table->date('datum_prijave');
            $table->string('ip_prijave', 50);
            $table->string('ime_racunara_prijave');
            $table->text('opis_kvara_zaposleni');
            $table->date('datum_prijema');
            $table->date('datum_isporuke');
            $table->text('opis_kvara_servis');
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->integer('uredjaj_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->text('napomena')->nullable();

            $table->foreign('vrsta_uredjaja_id')->references('id')->on('vrsta_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('status_id')->references('id')->on('s_statusi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'racunar_id']);
        Schema::dropIfExists('servis');
    }

}
