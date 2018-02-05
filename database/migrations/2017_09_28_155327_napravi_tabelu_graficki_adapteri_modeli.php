<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluGrafickiAdapteriModeli extends Migration
{
    public function up()
    {
        Schema::create('graficki_adapteri_modeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('cip', 50);
            $table->integer('tip_memorije_id')->unsigned();
            $table->integer('kapacitet_memorije')->unsigned();
            $table->integer('proizvodjac_id')->unsigned();
            $table->integer('vga_slot_id')->unsigned();
            $table->text('link')->nullable();
            $table->text('napomena')->nullable();

            $table->foreign('tip_memorije_id')->references('id')->on('s_tipovi_memorije')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proizvodjac_id')->references('id')->on('s_proizvodjaci')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vga_slot_id')->references('id')->on('vga_slotovi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropForeign(['tip_memorije_id', 'proizvodjac_id', 'vga_slot_id']);
        Schema::dropIfExists('graficki_adapteri_modeli');
    }
}
