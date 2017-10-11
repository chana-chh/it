<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSUprave extends Migration
{
    public function up()
    {
        Schema::create('s_uprave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 190)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_uprave');
    }
}
