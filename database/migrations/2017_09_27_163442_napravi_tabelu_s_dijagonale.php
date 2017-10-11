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
            $table->decimal('naziv', 10, 2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('s_dijagonale');
    }
}
