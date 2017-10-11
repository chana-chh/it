<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluStampaci extends Migration
{
    public function up()
    {
        Schema::create('stampaci', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventarski_broj', 10)->unique();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('stampac_model_id')->unsigned();
            $table->integer('kancelarija_id')->unsigned()->nullable();
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->text('napomena')->nullable();
			$table->softDeletes();
            $table->boolean('reciklirano')->default(false);
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->integer('nabavka_id')->unsigned()->nullable();
            
            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stampac_model_id')->references('id')->on('stampaci_modeli')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['racunar_id', 'stampac_model_id', 'stavka_otpremnice_id', 'kancelarija_id', 'nabavka_id']);
        Schema::dropIfExists('stampaci');
    }
}
