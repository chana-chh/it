<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluProcesori extends Migration
{

    public function up()
    {
        Schema::create('procesori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('procesor_model_id')->unsigned();
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->text('napomena')->nullable();
            $table->softDeletes();
            $table->integer('reciklirano_id')->unsigned()->nullable();

            $table->foreign('reciklirano_id')->references('id')->on('reciklaza')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('procesor_model_id')->references('id')->on('procesori_modeli')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'racunar_id',
            'procesor_model_id',
            'reciklirano_id',
            'vrsta_uredjaja_id',
            'stavka_otpremnice_id']);
        Schema::dropIfExists('osnovne_ploce');
    }

}
