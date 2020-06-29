<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    public function up()
    {
        Schema::create('items',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nomeitem',150)->unique();
            $table->text('descriitem')->nullable();
            $table->text('precoitem'); 
            
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
