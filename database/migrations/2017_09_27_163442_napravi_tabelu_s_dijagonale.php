<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSDijagonale extends Migration
{

    public function up()
    {
        Schema::create('s_dijagonale', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('naziv', 8, 1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_dijagonale');
    }

}
