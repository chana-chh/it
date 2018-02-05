<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSTipoviStampaca extends Migration
{
    public function up()
    {
        Schema::create('s_tipovi_stampaca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_tipovi_stampaca');
    }
}
