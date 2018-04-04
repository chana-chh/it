<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluUgovoriOdrzavanja extends Migration
{

    public function up()
    {
        Schema::create('ugovori_odrzavanja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('broj', 50);
            $table->string('predmet_ugovora', 70)->nullable();
            $table->date('datum_zakljucivanja');
            $table->date('datum_raskida');
            $table->decimal('iznos_sredstava', 15, 2)->default(0);
            $table->integer('dobavljac_id')->unsigned();
            $table->text('napomena')->nullable();

            $table->foreign('dobavljac_id')->references('id')->on('s_dobavljaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ugovori_odrzavanja');
    }

}
