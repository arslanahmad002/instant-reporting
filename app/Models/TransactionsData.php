<?php

namespace App\Models;

use App\Models\Transaction\TransactionBeneficiary;
use App\Models\Transaction\TransactionExtras;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionsData extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'Transaction Date', 'Transaction Time', 'Agent_ID_Collect', 'Agent_Name_Collect', 'Type', 'Agent_ID_Main', 'Agent_Name_Main', 'Office ID', 'Tr_No', 'PIN_No', 'Customer ID', 'Customer Full Name', 'Customer First Name', 'Customer Last Name', 'House no', 'Street', 'City', 'Post Code', 'Customer_State', 'Customer_Country', 'Customer_Tel', 'Customer_Cell', 'Customer_Email', 'Customer_MotherName', 'ID Type', 'ID Number', 'ID Issue', 'ID Expiry', 'Customer_ID_Issue_Place', 'Nationality', 'Customer_Gender', 'DOB', 'Birth_Place', 'Profession', 'Agent_ID_Pay', 'Agent_Name_Pay', 'Payment Method', 'Beneficiary Country', 'Customer Rate', 'Agent RATE', 'PayOut_CCY', 'Amount', 'PayIN_CCY', 'PayIN_Amt', 'Admin Charges', 'Agent Charges', 'Beneficiary Full Name', 'Beneficiary First Name', 'Beneficiary Last Name', 'Receiver Address', 'Receiver City', 'Receiver Phone', 'Receiver Email', 'Receiver Date of Birth', 'Receiver Place of Birth', 'Bank A/C #', 'Bank Name', 'Branch Name', 'Branch Code', 'Purpose_Category', 'Purpose_Comments', 'Status', 'Exported', 'Main Hold', 'Subadmin Hold', 'Paid Date', 'Paid Time', 'Buyer Rate', 'SubAgent Rate', 'Codice Fiscale', 'Beneficiary CNIC', 'Brnch Name', 'Brnch Code', 'Buyer Name', 'Total Transaction', 'Total Amount', 'Relationship', 'Payment SMethod', 'Payment Type', 'TMT NO', 'Buyer DC Rate', 'Customer Register Date', 'Customer ID 1', 'Customer ID 2', 'log Export Date', 'Registered By', 'Transaction By Device', 'Merchant Refernace', 'First Transaction Date', 'Last Transaction Date', 'SUMSUB Verified', 'LogID', 'Sender Status', 'created_at', 'updated_at', 'deleted_at'];
    protected $table = 'transactions_data';
    public function customers(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }


    public function transactionExtras(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TransactionExtras::class,'transaction_id');
    }

    public function transactionBenificiary(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TransactionBeneficiary::class,'transaction_id');
    }


}
