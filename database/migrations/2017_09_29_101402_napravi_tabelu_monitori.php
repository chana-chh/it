<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluMonitori extends Migration
{
    public function up()
    {
        Schema::create('monitori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventarski_broj', 10)->unique();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('monitor_model_id')->unsigned();
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->integer('kancelarija_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->boolean('reciklirano')->default(false);
            $table->text('napomena')->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->integer('nabavka_id')->unsigned()->nullable();

            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('monitor_model_id')->references('id')->on('monitori_modeli')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['racunar_id', 'monitor_model_id', 'stavka_otpremnice_id', 'nabavka_id', 'kancelarija_id']);
        Schema::dropIfExists('monitori');
    }
}
