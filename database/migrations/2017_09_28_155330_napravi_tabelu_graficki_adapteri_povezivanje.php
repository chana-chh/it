<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluGrafickiAdapteriPovezivanje extends Migration
{

    public function up()
    {
        Schema::create('graficki_adapteri_povezivanje', function (Blueprint $table) {
            $table->integer('graficki_adapter_model_id')->unsigned();
            $table->integer('povezivanje_id')->unsigned();

            $table->foreign('graficki_adapter_model_id')->references('id')->on('graficki_adapteri_modeli');
            $table->foreign('povezivanje_id')->references('id')->on('s_monitori_povezivanje');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'graficki_adapter_model_id',
            'povezivanje_id']);
        Schema::dropIfExists('graficki_adapteri_povezivanje');
    }

}
