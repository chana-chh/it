<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorisniciTable extends Migration
{

    public function up()
    {
        Schema::create('korisnici', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 190)->nullable();
            $table->string('username', 190)->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('korisnici');
    }

}
