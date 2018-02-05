<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluAplikacijeRacunari extends Migration
{
    public function up()
    {
        Schema::create('aplikacije_racunari', function (Blueprint $table) {
            $table->integer('aplikacija_id')->unsigned();
            $table->integer('racunar_id')->unsigned();
            
            $table->primary(['aplikacija_id', 'racunar_id']);

            $table->foreign('aplikacija_id')->references('id')->on('aplikacije');
            $table->foreign('racunar_id')->references('id')->on('racunari');
        });
    }

    public function down()
    {
        Schema::dropForeign(['aplikacija_id', 'racunar_id']);
        Schema::dropIfExists('aplikacije_racunari');
    }
}
