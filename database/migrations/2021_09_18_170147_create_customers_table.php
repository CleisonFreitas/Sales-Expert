<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',80);
            $table->string('apelido',15);
            $table->enum('status',['Ativo','Inativo']);
            $table->date('cadastro');
            $table->integer('resp_id')->unsigned();
            $table->date('nascimento')->nullable();
            $table->string('cpf',15)->nullable();
            $table->string('rg',25)->nullable();
            $table->enum('genero',['M','F']);
            $table->string('cep',10)->nullable();
            $table->string('logradouro',80)->nullable();
            $table->string('numero',6)->nullable();
            $table->string('cidade',20)->nullable();
            $table->string('estado',2)->nullable();
            $table->string('bairro',40)->nullable();
            $table->string('email',60)->nullable();
            $table->string('ct_num',16)->nullable();
            $table->string('ct_whats',16)->nullable();
            $table->string('facebook',60)->nullable();
            $table->string('instagram',60)->nullable();
            $table->foreign('resp_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
