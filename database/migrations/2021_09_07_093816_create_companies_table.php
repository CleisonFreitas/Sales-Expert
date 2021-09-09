<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('ceo_nome',20);
            $table->string('ceo_sobrenome',40);
            $table->string('empr_nome',80);
            $table->string('cep',14);
            $table->string('endereco',80);
            $table->string('cidade',40);
            $table->string('uf',2);
            $table->string('bairro',50);
            $table->string('email',80)->nullable();
            $table->string('num_c1',16)->nullable();
            $table->string('num_c2',16)->nullable();
            $table->string('facebook',50)->nullable();
            $table->string('instagram',50)->nullable();
            $table->string('whatsapp',16)->nullable();
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
        Schema::dropIfExists('company');
    }
}
