<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSkeneri extends Migration
{

    public function up()
    {
        Schema::create('skeneri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skener_model_id')->unsigned();
            $table->string('inventarski_broj', 10)->unique();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('kancelarija_id')->unsigned();
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->string('napomena')->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->boolean('reciklirano')->default(false);
            $table->integer('nabavka_id')->unsigned()->nullable();
            $table->integer('vrsta_uredjaja_id')->unsigned();

            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('skener_model_id')->references('id')->on('skeneri_modeli')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'skener_model_id',
            'kancelarija_id',
            'stavka_otpremnice_id',
            'racunar_id',
            'nabavka_id']);
        Schema::dropIfExists('skeneri');
    }

}
