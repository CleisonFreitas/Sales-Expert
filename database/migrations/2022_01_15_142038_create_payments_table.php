<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('customer_services_id')->unsigned();
            $table->integer('caix_ref')->unsigned();
            $table->integer('form_paga_id')->unsigned();
            $table->double('valor', 10, 2)->nullable()->default(0);
            $table->string('cortesia',4);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('customer_services_id')->references('ordem')->on('customer_services');
            $table->foreign('caix_ref')->references('id')->on('account_books');
            $table->foreign('form_paga_id')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('payments');
    }
}
