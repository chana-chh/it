<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluHdd extends Migration
{

    public function up()
    {
        Schema::create('hdd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->string('serijski_broj', 50)->nullable();
            $table->integer('hdd_model_id')->unsigned();
            $table->boolean('eksterni')->default(0);
            $table->integer('racunar_id')->unsigned()->nullable();
            $table->integer('zaposleni_id')->unsigned()->nullable();
            $table->integer('stavka_otpremnice_id')->unsigned()->nullable();
            $table->text('napomena')->nullable();
            $table->softDeletes();
            $table->integer('reciklirano_id')->unsigned()->nullable();

            $table->foreign('reciklirano_id')->references('id')->on('reciklaza')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('stavka_otpremnice_id')->references('id')->on('otpremnice_stavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('hdd_model_id')->references('id')->on('hdd_modeli')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'racunar_id',
            'reciklirano_id',
            'vrsta_uredjaja_id',
            'hdd_model_id',
            'stavka_otpremnice_id']);
        Schema::dropIfExists('hdd');
    }

}
