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
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->boolean('laptop')->default(false);
            $table->boolean('server')->default(false);
            $table->boolean('brend')->default(false);
            $table->integer('proizvodjac_id')->unsigned()->nullable();
            $table->string('inventarski_broj', 10)->nullable();
            $table->string('serijski_broj', 50)->nullable();
            $table->string('erc_broj', 100)->unique(); // dodati datum kod otpisa
            $table->string('ime', 100)->unique(); // dodati datum kod otpisa
            $table->integer('zaposleni_id')->unsigned()->nullable();
            $table->integer('kancelarija_id')->unsigned()->nullable();
            $table->integer('stavka_nabavke_id')->unsigned();
            $table->integer('ploca_id')->unsigned()->unique()->nullable();
            $table->integer('os_id')->unsigned()->nullable();
            $table->text('link')->nullable();
            $table->softDeletes(); // datum otpisa
            $table->text('napomena')->nullable();
            $table->integer('reciklirano_id')->unsigned()->nullable();

            $table->foreign('reciklirano_id')->references('id')->on('reciklaza')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('os_id')->references('id')->on('operativni_sistemi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('ploca_id')->references('id')->on('osnovne_ploce')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_nabavke_id')->references('id')->on('nabavke_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'zaposleni_id',
            'vrsta_uredjaja_id',
            'reciklirano_id',
            'kancelarija_id',
            'os_id',
            'ploca_id',
            'stavka_nabavke_id',
            'proizvodjac_id']);
        Schema::dropIfExists('racunari');
    }

}
