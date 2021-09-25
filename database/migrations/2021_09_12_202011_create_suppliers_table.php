<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt_cad');
            $table->enum('status',['on','off']);
            $table->string('nome',80);
            $table->string('cnpj',20)->nullable();
            $table->string('cep',10)->nullable();
            $table->string('logradouro',80)->nullable();
            $table->string('numero',5)->nullable();
            $table->string('cidade',30)->nullable();
            $table->string('estado',2)->nullable();
            $table->string('bairro',30)->nullable();
            $table->string('email',80)->nullable();
            $table->string('ct_num',17)->nullable();
            $table->string('whatsapp',17)->nullable();
            $table->string('instagram',40)->nullable();
            $table->string('facebook',40)->nullable();
            $table->text('prod_desc')->nullable();
            $table->text('serv_desc')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
