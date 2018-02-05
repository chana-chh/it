<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSHddPovezivanja extends Migration
{
    public function up()
    {
        Schema::create('s_hdd_povezivanja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_hdd_povezivanja');
    }
}
