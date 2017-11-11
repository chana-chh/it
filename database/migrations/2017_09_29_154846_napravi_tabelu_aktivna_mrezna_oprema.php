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
            $table->string('naziv', 100)->unique();
            $table->integer('broj_portova')->unsigned();
            $table->boolean('upravljiv')->default(0);
            $table->string('inventarski_broj', 10);
            $table->integer('kancelarija_id')->unsigned();
            $table->integer('proizvodjac_id')->unsigned();
            $table->string('napomena')->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->text('link')->nullable();
            $table->softDeletes();
            $table->boolean('reciklirano')->default(false);
            $table->integer('nabavka_id')->unsigned()->nullable();
            $table->integer('vrsta_uredjaja_id')->unsigned();

            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'proizvodjac_id',
            'kancelarija_id',
            'stavka_otpremnice_id',
            'nabavka_id']);
        Schema::dropIfExists('aktivna_mrezna_oprema');
    }

}
