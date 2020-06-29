<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Eventos extends Migration
{

    public function up()
    {
        Schema::create('eventos',function (Blueprint $table){
            $table->bigIncrements('idevento');
            $table->string('nomeevento',150)->unique();
            $table->text('descrievento')->nullable(); 
            $table->string('dataevento');
            $table->string('horaevento');
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
