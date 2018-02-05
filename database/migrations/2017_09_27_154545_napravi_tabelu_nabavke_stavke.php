<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluNabavkeStavke extends Migration
{

    public function up()
    {
        Schema::create('nabavke_stavke', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nabavka_id')->unsigned();
            $table->integer('vrsta_uredjaja_id')->unsigned();
            $table->string('naziv');
            $table->decimal('kolicina', 10, 2)->default(0);
            $table->enum('jedinica_mere', [
                'komad',
                'sat',
                'metar',
                'kilogram'])->nullable();
            $table->string('napomena')->nullable();

            $table->foreign('nabavka_id')->references('id')->on('nabavke')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vrsta_uredjaja_id')->references('id')->on('s_vrste_uredjaja')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'nabavka_id',
            'vrsta_uredjaja_id']);
        Schema::dropIfExists('nabavke_stavke');
    }

}
