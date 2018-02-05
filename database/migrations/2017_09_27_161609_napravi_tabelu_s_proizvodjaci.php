<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSProizvodjaci extends Migration
{
    public function up()
    {
        Schema::create('s_proizvodjaci', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 190)->unique();
            $table->string('link')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_proizvodjaci');
    }
}
