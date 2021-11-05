<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caixa_id')->unsigned();
            $table->date('data_aber');
            $table->foreign('caixa_id')->references('id')->on('account_references');
            $table->date('data_fech')->nullable();
            $table->string('referencia', 4);
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
        Schema::dropIfExists('account_books');
    }
}
