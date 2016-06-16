<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('idUsuario');
            $table->string('nomeUsuario')->nullable(false);
            $table->string('emailUsuario')->nullable(false)->unique();
            $table->string('telefoneUsuario')->nullable(false)->unique();
            $table->rememberToken();
            $table->string('password')->nullable(false);
            $table->integer('statusUsuario')->nullable(false)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
