<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluGreske extends Migration
{

    public function up()
    {
        Schema::create('greske', function (Blueprint $table) {
            $table->increments('id');
            $table->text('greska');
        });
    }

    public function down()
    {
        Schema::dropIfExists('greske');
    }

}
