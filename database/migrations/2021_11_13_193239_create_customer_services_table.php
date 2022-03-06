<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_services', function (Blueprint $table) {
            $table->increments('ordem');
            $table->string('descricao');
            $table->date('cadastro')->nullable();
            $table->string('status',1);
            $table->date('data_agend')->nullable();
            $table->string('hora_agend',10);
            $table->integer('resp_id')->unsigned();
            $table->integer('cust_id')->unsigned();
            $table->string('service_id')->nullable();
            $table->text('observacao')->nullable();
            $table->double('valor', 10, 2)->nullable();
            $table->foreign('resp_id')->references('id')->on('employers');
            $table->foreign('cust_id')->references('id')->on('customers');
          //  $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('customer_services');
    }
}
