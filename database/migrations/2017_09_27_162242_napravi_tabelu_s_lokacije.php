<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSLokacije extends Migration
{
    public function up()
    {
        Schema::create('s_lokacije', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('adresa_ulica', 100)->nullable();
            $table->string('adresa_broj', 50)->nullable();
            $table->text('napomena')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_lokacije');
    }
}
