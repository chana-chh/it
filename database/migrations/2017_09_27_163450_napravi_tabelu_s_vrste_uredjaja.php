<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSVrsteUredjaja extends Migration
{

    public function up()
    {
        Schema::create('s_vrste_uredjaja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 100)->unique();
            $table->string('mnozina', 100);
            $table->string('ruta');
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_vrste_uredjaja');
    }

}
