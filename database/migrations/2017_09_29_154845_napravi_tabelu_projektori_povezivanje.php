<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluProjektoriPovezivanje extends Migration
{
    public function up()
    {
        Schema::create('projektori_povezivanje', function (Blueprint $table) {
            $table->integer('projektor_id')->unsigned();
            $table->integer('povezivanje_id')->unsigned();
        });

        Schema::table('projektori_povezivanje', function($table) {
            $table->foreign('projektor_id')->references('id')->on('projektori');
            $table->foreign('povezivanje_id')->references('id')->on('s_monitori_povezivanje');
        });
    }

    public function down()
    {
        Schema::dropForeign(['projektor_id', 'povezivanje_id']);
        Schema::dropIfExists('projektori_povezivanje');
    }
}
