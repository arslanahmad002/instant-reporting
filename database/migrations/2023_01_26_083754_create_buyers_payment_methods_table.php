<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers_payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country')->length(30)->nullable();
            $table->foreignId('b_id') ->constrained()->references('id')->on('buyers')->cascadeOnUpdate();
            $table->foreignId('c_id')->constrained()->references('id')->on('currencies')->cascadeOnUpdate();
            $table->foreignId('p_m_id')->constrained()->references('id')->on('payment_methods')->cascadeOnUpdate();
            $table->float('rate')->length(20)->nullable();
            $table->tinyInteger('status')->length(2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers_payment_methods');
    }
}
