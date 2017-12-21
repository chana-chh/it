<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluAktivnaMreznaOprema extends Migration
{

    public function up()
    {
        Schema::create('aktivna_mrezna_oprema', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->string('naziv', 100);
            $table->string('inventarski_broj', 10)->nullable();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('broj_portova')->unsigned();
            $table->boolean('upravljiv')->default(false);
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('kancelarija_id')->unsigned();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->integer('stavka_nabavke_id')->unsigned()->nullable();
            $table->string('napomena')->nullable();
            $table->text('link')->nullable();
            $table->softDeletes();
            $table->integer('reciklirano_id')->unsigned()->nullable();

            $table->foreign('reciklirano_id')->references('id')->on('reciklaza')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_nabavke_id')->references('id')->on('nabavke_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'proizvodjac_id',
            'reciklirano_id',
            'vrsta_uredjaja_id',
            'kancelarija_id',
            'stavka_otpremnice_id',
            'stavka_nabavke_id']);
        Schema::dropIfExists('aktivna_mrezna_oprema');
    }

}
