<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSMonitoriPovezivanje extends Migration
{

    public function up()
    {
        Schema::create('s_monitori_povezivanje', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 100)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_monitori_povezivanje');
    }

}
