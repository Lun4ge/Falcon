<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Locais extends Migration
{
    public function up()
    {
        Schema::create('locais',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nomelocal',150)->unique();
            $table->text('descrilocal')->nullable();; 
            $table->string('emaillocal',80)->nullable();
            $table->string('telelocal')->nullable();
            $table->string('implocal')->nullable();
            $table->string('tipolocal')->nullable();
            $table->string('moradalocal')->nullable();
            $table->string('lugarlocal')->nullable();
            $table->string('imagelocal')->nullable()->default('semimagem.png');

            $table->decimal('Longitude',30,16);
            $table->decimal('Latitude',30,16);

            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        //colocar os dois (items_id,locais_id) como chave unica juntos.
        Schema::create('items_locais',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->BigInteger('locais_id')->unsigned();
            $table->BigInteger('items_id')->unsigned();
            $table->timestamps();

            $table->unique('locais_id','items_id');

            $table->foreign('locais_id')->references('id')->on('locais')->onDelete('cascade');
            $table->foreign('items_id')->references('id')->on('items')->onDelete('cascade');
        });

        DB::table('locais')->insert(
            array(
                'nomelocal' => 'Guarda Nacional Republicana',
                'telelocal' => '263504118',
                'descrilocal' => 'A Guarda Nacional Republicana é uma força de segurança de natureza militar de Portugal, 
                constituída por militares organizados num corpo especial de tropas e dotada de autonomia administrativa, 
                com jurisdição em todo o território nacional e no mar territorial.',
                'implocal' => 'sim',
                'tipolocal' => 'Policia',
                'Latitude' => '39.0245450822524',
                'Longitude' => '-8.790345046047905',
                'user_id' => '1'
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('locais');
    }
}
