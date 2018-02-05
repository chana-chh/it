<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluAdreseEPoste extends Migration
{

    public function up()
    {
        Schema::create('adrese_e_poste', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adresa');
            $table->boolean('sluzbena')->default(1);
            $table->integer('zaposleni_id')->unsigned();
            $table->string('napomena')->nullable();
            $table->text('lozinka')->nullable();

            $table->foreign('zaposleni_id')->references('id')->on('zaposleni')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'zaposleni_id']);
        Schema::dropIfExists('adrese_e_poste');
    }

}
