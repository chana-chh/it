<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluMobilni extends Migration
{
    public function up()
    {
        Schema::create('mobilni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('broj');
            $table->boolean('sluzbeni')->default(1);
            $table->integer('zaposleni_id')->unsigned();
            $table->string('napomena')->nullable();
            
            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['zaposleni_id']);
        Schema::dropIfExists('mobilni');
    }
}
