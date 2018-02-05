<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluPodesavanja extends Migration
{
    public function up()
    {
        Schema::create('podesavanja', function (Blueprint $table) {
            $table->string('naziv', 190);
            $table->string('vrednost');

            $table->primary('naziv');
        });
    }

    public function down()
    {
        Schema::dropIfExists('podesavanja');
    }
}
