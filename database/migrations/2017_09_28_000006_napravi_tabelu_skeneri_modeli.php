<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSkeneriModeli extends Migration
{
    public function up()
    {
        Schema::create('skeneri_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->integer('proizvodjac_id')->unsigned();
            $table->string('format', 20)->nullable();
            $table->string('rezolucija', 20)->nullable();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['proizvodjac_id']);
        Schema::dropIfExists('skeneri_modeli');
    }
}
