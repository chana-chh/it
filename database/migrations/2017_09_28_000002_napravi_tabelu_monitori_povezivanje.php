<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluMonitoriPovezivanje extends Migration
{
    public function up()
    {
        Schema::create('monitori_povezivanje', function (Blueprint $table) {
            $table->integer('monitor_model_id')->unsigned();
            $table->integer('povezivanje_id')->unsigned();

            $table->foreign('monitor_model_id')->references('id')->on('monitori_modeli');
            $table->foreign('povezivanje_id')->references('id')->on('s_monitori_povezivanje');
        });
    }

    public function down()
    {
        Schema::dropForeign(['monitor_model_id', 'povezivanje_id']);
        Schema::dropIfExists('monitori_povezivanje');
    }
}
