<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluTelefoni extends Migration
{
    public function up()
    {
        Schema::create('telefoni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('broj');
            $table->enum('vrsta', ['direktni', 'lokal', 'fax'])->nullable();
            $table->integer('kancelarija_id')->unsigned();
            $table->string('napomena')->nullable();
            
            $table->foreign('kancelarija_id')->references('id')->on('s_kancelarije')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['kancelarija_id']);
        Schema::dropIfExists('telefoni');
    }
}
