<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOtpremniceStavke extends Migration
{

    public function up()
    {
        Schema::create('otpremnice_stavke', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('otpremnica_id')->unsigned();
            $table->string('naziv');
            $table->decimal('kolicina', 10, 2)->default(0);
            $table->enum('jedinica_mere', [
                'komad',
                'sat',
                'metar',
                'kilogram'])->nullable();
            $table->string('napomena')->nullable();

            $table->foreign('otpremnica_id')->references('id')->on('otpremnice')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'otpremnica_id']);
        Schema::dropIfExists('otpremnice_stavke');
    }

}
