<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluNabavke extends Migration
{

    public function up()
    {
        Schema::create('nabavke', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dobavljac_id')->unsigned();
            $table->date('datum');
            $table->integer('garancija')->unsigned()->default(0);
            $table->text('napomena')->nullable();

            $table->foreign('dobavljac_id')->references('id')->on('s_dobavljaci')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'dobavljac_id']);
        Schema::dropIfExists('nabavke');
    }

}
