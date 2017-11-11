<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluRacunari extends Migration
{

    public function up()
    {
        Schema::create('racunari', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('laptop')->default(0);
            $table->boolean('server')->default(0);
            $table->boolean('brend')->default(0);
            $table->integer('proizvodjac_id')->unsigned()->nullable();
            $table->string('inventarski_broj', 10);
            $table->string('erc_broj', 100)->unique(); // dodati datum kod otpisa
            $table->string('ime', 100)->unique(); // dodati datum kod otpisa
            $table->integer('zaposleni_id')->unsigned()->nullable();
            $table->integer('kancelarija_id')->unsigned()->nullable();
            $table->integer('nabavka_id')->unsigned();
            $table->integer('os_id')->unsigned()->nullable();
            $table->integer('ocena')->unsigned();
            $table->text('link')->nullable();
            $table->softDeletes(); // datum otpisa
            $table->boolean('reciklirano')->default(false);
            $table->text('napomena')->nullable();
            $table->integer('vrsta_uredjaja_id')->unsigned();

            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('os_id')->references('id')->on('operativni_sistemi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'zaposleni_id',
            'kancelarija_id',
            'os_id',
            'nabavka_id',
            'proizvodjac_id']);
        Schema::dropIfExists('racunari');
    }

}
