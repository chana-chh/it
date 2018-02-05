<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluUpsModeli extends Migration
{

    public function up()
    {
        Schema::create('ups_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('kapacitet', 30)->nullable();
            $table->string('snaga', 30)->nullable();
            $table->integer('tip_baterije_id')->unsigned();
            $table->integer('broj_baterija')->unsigned()->default(0);
            $table->integer('proizvodjac_id')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tip_baterije_id')->references('id')->on('s_baterije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'proizvodjac_id']);
        Schema::dropIfExists('ups_modeli');
    }

}
