<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rcl_customer_id')->nullable();
            $table->string('full_name','100')->nullable();
            $table->string('first_name','100')->nullable();
            $table->string('last_name','100')->nullable();
            $table->string('house_no','100')->nullable();
            $table->string('street','150')->nullable();
            $table->string('post_code','50')->nullable();
            $table->string('state','100')->nullable();
            $table->string('city','100')->nullable();
            $table->string('country','255')->nullable();
            $table->string('tel','30')->nullable();
            $table->string('cell_number','70')->nullable();
            $table->string('email',255)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('registered_by',70)->nullable();
            $table->date('register_date')->nullable();
            $table->integer('number_of_transaction')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('online_customers');
    }
};
