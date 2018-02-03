<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 190)->unique();
            $table->integer('level')->unsigned();
            $table->text('opis')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }

}
