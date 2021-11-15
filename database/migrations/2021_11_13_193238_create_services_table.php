<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100)->nullable()->default('text');
            $table->date('dt_geracao');
            $table->enum('status', ['Ativo','Inativo'])->default('Ativo');
            $table->double('valor', 10, 2)->nullable();
            $table->string('observacao')->nullable();
            $table->integer('operador_id')->unsigned();
            $table->string('operador', 100)->nullable();
            $table->foreign('operador_id')->references('id')->on('users');
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
        Schema::dropIfExists('services');
    }
}
