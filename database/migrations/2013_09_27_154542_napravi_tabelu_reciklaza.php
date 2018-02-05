<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluReciklaza extends Migration
{
    public function up()
    {
        Schema::create('reciklaza', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datum');
            $table->text('napomena')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reciklaza');
    }
}
