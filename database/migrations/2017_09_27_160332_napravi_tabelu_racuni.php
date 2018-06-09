<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluRacuni extends Migration
{

    public function up()
    {
        Schema::create('racuni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('broj', 50);
            $table->string('opis', 70)->nullable();
            $table->date('datum');
            $table->decimal('iznos', 15, 2)->default(0);
            $table->decimal('pdv', 15, 2)->default(0);
            $table->decimal('ukupno', 15, 2)->default(0);
            $table->text('napomena')->nullable();
            $table->integer('ugovor_id')->unsigned();

            $table->foreign('ugovor_id')->references('id')->on('ugovori_odrzavanja')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'ugovor_id']);
        Schema::dropIfExists('racuni');
    }

}
