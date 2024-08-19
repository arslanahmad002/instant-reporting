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
        Schema::create('transactions_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Transaction Date',50)->nullable()->default(NULL);
            $table->string('Transaction Time',50)->nullable()->default(NULL);
            $table->string('Agent_ID_Collect',20)->nullable()->default(NULL);
            $table->string('Agent_Name_Collect',50)->nullable()->default(NULL);
            $table->string('Type',50)->nullable()->default(NULL);
            $table->string('Agent_ID_Main',20)->nullable()->default(NULL);
            $table->string('Agent_Name_Main',20)->nullable()->default(NULL);
            $table->string('Office ID',20)->nullable()->default(NULL);
            $table->string('Tr_No',100)->nullable()->default(NULL);
            $table->string('PIN_No',100)->nullable()->default(NULL);
            $table->string('Customer ID',100)->nullable()->default(NULL);
            $table->string('Customer Full Name',255)->nullable()->default(NULL);
            $table->string('Customer First Name',255)->nullable()->default(NULL);
            $table->string('Customer Last Name',255)->nullable()->default(NULL);
            $table->string('House no',255)->nullable()->default(NULL);
            $table->string('Street',255)->nullable()->default(NULL);
            $table->string('City',255)->nullable()->default(NULL);
            $table->string('Post Code',50)->nullable()->default(NULL);
            $table->string('Customer_State',255)->nullable()->default(NULL);
            $table->string('Customer_Country',255)->nullable()->default(NULL);
            $table->string('Customer_Tel',100)->nullable()->default(NULL);
            $table->string('Customer_Cell',100)->nullable()->default(NULL);
            $table->string('Customer_Email',255)->nullable()->default(NULL);
            $table->string('Customer_MotherName',255)->nullable()->default(NULL);
            $table->string('ID Type',100)->nullable()->default(NULL);
            $table->string('ID Number',255)->nullable()->default(NULL);
            $table->string('ID Issue',100)->nullable()->default(NULL);
            $table->string('ID Expiry',100)->nullable()->default(NULL);
            $table->string('Customer_ID_Issue_Place',20)->nullable()->default(NULL);
            $table->string('Nationality',20)->nullable()->default(NULL);
            $table->string('Customer_Gender',50)->nullable()->default(NULL);
            $table->string('DOB',100)->nullable()->default(NULL);
            $table->string('Birth_Place',100)->nullable()->default(NULL);
            $table->string('Profession',150)->nullable()->default(NULL);
            $table->string('Agent_ID_Pay',20)->nullable()->default(NULL);
            $table->string('Agent_Name_Pay',255)->nullable()->default(NULL);
            $table->string('Payment Method',100)->nullable()->default(NULL);
            $table->string('Beneficiary Country',255)->nullable()->default(NULL);
            $table->string('Customer Rate',10)->nullable()->default(NULL);
            $table->string('Agent RATE',10)->nullable()->default(NULL);
            $table->string('PayOut_CCY',10)->nullable()->default(NULL);
            $table->string('Amount',50)->nullable()->default(NULL);
            $table->string('PayIN_CCY',10)->nullable()->default(NULL);
            $table->string('PayIN_Amt',50)->nullable()->default(NULL);
            $table->string('Admin Charges',20)->nullable()->default(NULL);
            $table->string('Agent Charges',20)->nullable()->default(NULL);
            $table->string('Beneficiary Full Name',255)->nullable()->default(NULL);
            $table->string('Beneficiary First Name',255)->nullable()->default(NULL);
            $table->string('Beneficiary Last Name',255)->nullable()->default(NULL);
            $table->string('Receiver Address',255)->nullable()->default(NULL);
            $table->string('Receiver City',255)->nullable()->default(NULL);
            $table->string('Receiver Phone',255)->nullable()->default(NULL);
            $table->string('Receiver Email',255)->nullable()->default(NULL);
            $table->string('Receiver Date of Birth',100)->nullable()->default(NULL);
            $table->string('Receiver Place of Birth',100)->nullable()->default(NULL);
            $table->string('Bank A/C #',255)->nullable()->default(NULL);
            $table->string('Bank Name',255)->nullable()->default(NULL);
            $table->string('Branch Name',255)->nullable()->default(NULL);
            $table->string('Branch Code',255)->nullable()->default(NULL);
            $table->string('Purpose_Category',255)->nullable()->default(NULL);
            $table->string('Purpose_Comments',255)->nullable()->default(NULL);
            $table->string('Status',100)->nullable()->default(NULL);
            $table->string('Exported',100)->nullable()->default(NULL);
            $table->string('Main Hold',100)->nullable()->default(NULL);
            $table->string('Subadmin Hold',100)->nullable()->default(NULL);
            $table->string('Paid Date',100)->nullable()->default(NULL);
            $table->string('Paid Time',100)->nullable()->default(NULL);
            $table->string('Buyer Rate',20)->nullable()->default(NULL);
            $table->string('SubAgent Rate',20)->nullable()->default(NULL);
            $table->string('Codice Fiscale',255)->nullable()->default(NULL);
            $table->string('Beneficiary CNIC',255)->nullable()->default(NULL);
            $table->string('Brnch Name',255)->nullable()->default(NULL);
            $table->string('Brnch Code',255)->nullable()->default(NULL);
            $table->string('Buyer Name',255)->nullable()->default(NULL);
            $table->string('Total Transaction',10)->nullable()->default(NULL);
            $table->string('Total Amount',100)->nullable()->default(NULL);
            $table->string('Relationship',255)->nullable()->default(NULL);
            $table->string('Payment SMethod',255)->nullable()->default(NULL);
            $table->string('Payment Type',50)->nullable()->default(NULL);
            $table->string('TMT NO',255)->nullable()->default(NULL);
            $table->string('Buyer DC Rate',100)->nullable()->default(NULL);
            $table->string('Customer Register Date',100)->nullable()->default(NULL);
            $table->string('Customer ID 1',255)->nullable()->default(NULL);
            $table->string('Customer ID 2',255)->nullable()->default(NULL);
            $table->string('log Export Date',255)->nullable()->default(NULL);
            $table->string('Registered By',100)->nullable()->default(NULL);
            $table->string('Transaction By Device',100)->nullable()->default(NULL);
            $table->string('Merchant Refernace',100)->nullable()->default(NULL);
            $table->string('First Transaction Date',100)->nullable()->default(NULL);
            $table->string('Last Transaction Date',100)->nullable()->default(NULL);
            $table->text('SUMSUB Verified')->nullable()->default(NULL);
            $table->text('LogID')->nullable()->default(NULL);
            $table->text('Sender Status')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_data');
    }
};
