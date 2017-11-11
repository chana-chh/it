<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOsnovnePloce extends Migration
{

    public function up()
    {
        Schema::create('osnovne_ploce', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('osnovna_ploca_model_id')->unsigned();
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->text('napomena')->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->boolean('reciklirano')->default(false);
            $table->integer('vrsta_uredjaja_id')->unsigned();

            $table->foreign('vrsta_uredjaja_id')->references('id')->on('vrsta_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('osnovna_ploca_model_id')->references('id')->on('osnovne_ploce_modeli')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'racunar_id',
            'osnovna_ploca_model_id',
            'stavka_otpremnice_id']);
        Schema::dropIfExists('osnovne_ploce');
    }

}
