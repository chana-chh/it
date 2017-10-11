<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOtpremniceSlike extends Migration
{
    public function up()
    {
        Schema::create('otpremnice_slike', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('otpremnica_id')->unsigned();
            $table->string('src');

            $table->foreign('otpremnica_id')->references('id')->on('otpremnice')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['otpremnica_id']);
        Schema::dropIfExists('otpremnice_slike');
    }
}
