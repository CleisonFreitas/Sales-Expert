<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria',1);
            $table->enum('status',['Ativo','Inativo']);
            $table->string('descricao',80);
            $table->string('tipo',15);
            $table->string('uso',15);
            $table->integer('pertence')->unsigned()->nullable();
            $table->timestamps();
            $table->integer('operador_id')->unsigned();
            $table->string('operador_nome',80);
            $table->foreign('operador_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
