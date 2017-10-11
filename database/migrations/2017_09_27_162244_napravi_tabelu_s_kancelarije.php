<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSKancelarije extends Migration
{
    public function up()
    {
        Schema::create('s_kancelarije', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50);
            $table->integer('sprat_id')->unsigned();
            $table->integer('lokacija_id')->unsigned();
            $table->text('napomena')->nullable();

            $table->foreign('lokacija_id')->references('id')->on('s_lokacije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('sprat_id')->references('id')->on('s_spratovi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['lokacija_id', 'sprat_id']);
        Schema::dropIfExists('s_kancelarije');
    }
}
