<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluServisKvarovi extends Migration
{

    public function up()
    {
        Schema::create('servis_kvarovi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servis_id')->unsigned();
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->integer('uredjaj_id')->unsigned();

            $table->foreign('servis_id')->references('id')->on('servis_kvarovi')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['servis_id', 'vrsta_uredjaja_id']);
        Schema::dropIfExists('racuni_slike');
    }

}
