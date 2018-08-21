<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluAplikacije extends Migration
{
    public function up()
    {
        Schema::create('aplikacije', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 100)->unique();
            $table->boolean('legalan')->default(0);
            $table->boolean('microsoft')->default(0);
            $table->integer('proizvodjac_id')->unsigned();
            $table->text('opis')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['proizvodjac_id']);
        Schema::dropIfExists('aplikacije');
    }
}
