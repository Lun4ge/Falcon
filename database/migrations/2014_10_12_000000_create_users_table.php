<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('lvluser')->nullable();
            $table->string('creatoruser')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'RMarques',
                'email' => 'rafael.g.marques@protonmail.com',
                'password' => Hash::make('SouUmaBatata'),
                'lvluser' => 'Admin'
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'Professor',
                'email' => 'professor@ae-salvaterra.pt',
                'password' => Hash::make('escola'),
                'lvluser' => 'Admin'
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
