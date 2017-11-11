<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOtpremnice extends Migration
{

    public function up()
    {
        Schema::create('otpremnice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('broj', 50);
            $table->integer('racun_id')->unsigned()->nullable();
            $table->date('datum');
            $table->text('napomena')->nullable();
            $table->integer('dobavljac_id')->unsigned();
            $table->string('broj_profakture', 100)->nullable();
            $table->softDeletes();

            $table->foreign('dobavljac_id')->references('id')->on('s_dobavljaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('racun_id')->references('id')->on('racuni')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'dobavljac_id',
            'racun_id']);
        Schema::dropIfExists('otpremnice');
    }

}
