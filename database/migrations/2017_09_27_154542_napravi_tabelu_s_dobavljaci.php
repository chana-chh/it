<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSDobavljaci extends Migration
{
    public function up()
    {
        Schema::create('s_dobavljaci', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 190)->unique();
            $table->string('adresa_mesto', 50)->nullable();
            $table->string('adresa_ulica', 100)->nullable();
            $table->string('adresa_broj', 50)->nullable();
            $table->string('telefon', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('link')->nullable();
            $table->text('napomena')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_dobavljaci');
    }
}
