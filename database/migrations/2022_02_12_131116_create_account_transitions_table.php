<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_transitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operador',80);
            $table->date('lancamento');
            $table->integer('caixa_id')->unsigned();
            $table->integer('conta_id')->unsigned();
            $table->integer('form_pagamento_id')->unsigned();
            $table->double('valor',10,2);
            $table->string('observacao')->nullable();
            $table->foreign('livro_caixa_id')->references('id')->on('account_books');
            $table->foreign('conta_id')->references('id')->on('accounts');
            $table->foreign('form_pagamento_id')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('account_transitions');
    }
}
