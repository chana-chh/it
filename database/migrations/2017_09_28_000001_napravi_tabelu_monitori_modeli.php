<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluMonitoriModeli extends Migration
{
    public function up()
    {
        Schema::create('monitori_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 100)->unique();
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('dijagonala_id')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

             $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
             $table->foreign('dijagonala_id')->references('id')->on('s_dijagonale')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['dijagonala_id', 'proizvodjac_id']);
        Schema::dropIfExists('monitori_modeli');
    }
}
