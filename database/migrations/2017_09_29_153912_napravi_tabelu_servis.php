<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluServis extends Migration
{
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opis_kvara');
            $table->date('datum_prijema');
            $table->date('datum_isporuke');
            $table->integer('racunar_id')->unsigned();
            $table->text('napomena')->nullable();

            $table->foreign('racunar_id')->references('id')->on('racunari')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['racunar_id']);
        Schema::dropIfExists('servis');
    }
}
