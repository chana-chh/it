<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluOperativniSistemi extends Migration
{
    public function up()
    {
        Schema::create('operativni_sistemi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->text('napomena')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('operativni_sistemi');
    }
}
