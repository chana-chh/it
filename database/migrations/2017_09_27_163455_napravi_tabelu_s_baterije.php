<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NapraviTabeluSBaterije extends Migration
{

    public function up()
    {
        Schema::create('s_baterije', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 50)->unique();
            $table->string('kapacitet', 30);
            $table->string('napon', 30);
            $table->string('dimenzije', 30);
            $table->text('modeli_baterija')->nullable();
        });
    }

    public function down()
    {
        Schema::dropForeign([
            'ups_model_id',
            'stavka_otpremnice_id',
            'kancelarija_id',
            'nabavka_id']);
        Schema::dropIfExists('s_baterije');
    }

}
