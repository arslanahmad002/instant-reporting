<?php

namespace App\Traits;

use App\Jobs\InsertTransactionData;
use App\Models\CategoryPurpose;
use App\Models\CurrenciesRate;
use App\Models\Currency;
use App\Models\TransactionsData;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait Transactions
{
    use CacheTrait;


    public function processTransactionFile(string $filepath = ''): void
    {
        $file = Storage::get($filepath);
        $header = null;
        $data = [];
        $batchSize = 500;
        if (($handle = fopen(Storage::path($filepath), 'r')) !== false) {
            while (($row = fgetcsv($handle, 10000, ',')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data = array_combine($header, $row);
                    DB::table("transactions_data")->insert($data);
                    // if (count($data) >= $batchSize) {
                        // InsertTransactionData::dispatch(json_encode($data));
                        // $data = [];
                    // }
                }
            }
            // if (!empty($data)) {
            //     InsertTransactionData::dispatch(json_encode($data));
            // }

        }
    }

    private function insertRows(array $data): void
    {
        DB::table('transactions_data')->insert($data);
    }

    public function createTransaction($data): void
    {
        $data1 = ['Transaction Date', 'Transaction Time', 'Agent_ID_Collect', 'Agent_Name_Collect', 'Type', 'Agent_ID_Main', 'Agent_Name_Main', 'Office ID', 'Tr_No', 'PIN_No', 'Customer ID', 'Customer Full Name', 'Customer First Name', 'Customer Last Name', 'House no', 'Street', 'City', 'Post Code', 'Customer_State', 'Customer_Country', 'Customer_Tel', 'Customer_Cell', 'Customer_Email', 'Customer_MotherName', 'ID Type', 'ID Number', 'ID Issue', 'ID Expiry', 'Customer_ID_Issue_Place', 'Nationality', 'Customer_Gender', 'DOB', 'Birth_Place', 'Profession', 'Agent_ID_Pay', 'Agent_Name_Pay', 'Payment Method', 'Beneficiary Country', 'Customer Rate', 'Agent RATE', 'PayOut_CCY', 'Amount', 'PayIN_CCY', 'PayIN_Amt', 'Admin Charges', 'Agent Charges', 'Beneficiary Full Name', 'Beneficiary First Name', 'Beneficiary Last Name', 'Receiver Address', 'Receiver City', 'Receiver Phone', 'Receiver Email', 'Receiver Date of Birth', 'Receiver Place of Birth', 'Bank A/C #', 'Bank Name', 'Branch Name', 'Branch Code', 'Purpose_Category', 'Purpose_Comments', 'Status', 'Exported', 'Main Hold', 'Subadmin Hold', 'Paid Date', 'Paid Time', 'Buyer Rate', 'SubAgent Rate', 'Codice Fiscale', 'Beneficiary CNIC', 'Brnch Name', 'Brnch Code', 'Buyer Name', 'Total Transaction', 'Total Amount', 'Relationship', 'Payment SMethod', 'Payment Type', 'TMT NO', 'Buyer DC Rate', 'Customer Register Date', 'Customer ID 1', 'Customer ID 2', 'log Export Date', 'Registered By', 'Transaction By Device', 'Merchant Refernace', 'First Transaction Date', 'Last Transaction Date', 'SUMSUB Verified', 'LogID', 'Sender Status', 'created_at', 'updated_at', 'deleted_at'];
        set_time_limit(100000);
        ini_set('memory_limit', '-1');
        $transaction_data = [];
//        $old_transactions = TransactionsData::select('transaction_id')->pluck('transaction_id')->toArray();

        for( $i = 0; $i < count($data); $i++  ){
            $transaction = $data[$i];
            $newArr = [];
            foreach($transaction as $key => $value) {
                $newArr[$data1[$key]] = $value;
            }
//            if ( !in_array($transaction[3],$old_transactions)){
                $new_transaction = TransactionsData::insert($newArr);
//            }
        }
    }

    public function getVolInGBP($rate){
       return DB::raw('SUM(IF
        (sending_country="United Kingdom",
        (pounds-admin_charges)
        ,(pounds/' . $rate . '-admin_charges)
        )) AS vol_in_gbp');
    }

    public function getFxInGbp($rate){
        return DB::raw('SUM(IF(sending_country="United Kingdom",(((buyer_rate_dc-rate)*(pounds-admin_charges))/ buyer_rate_dc),(((buyer_rate_dc-rate)*(pounds-admin_charges))/buyer_rate_dc))/' . $rate . ') AS fx_in_gbp');
    }

    public function getChargesInGbp($rate){
        return DB::raw('SUM(IF(sending_country="United Kingdom",(admin_charges),(admin_charges/' . $rate . '))) AS charges_in_gbp');
    }

    public function getAdminChargesInGbp($rate){
        return DB::raw('SUM(IF(agent_name="SSRL",((admin_charges/' . $rate . ')-(admin_charges/' . $rate . ')),(admin_charges/' . $rate . ')))  AS net_admin_charges_in_gbp');
    }

    public function getFxLoss($rate){
      return  DB::raw('SUM(IF(sending_country="United Kingdom",
        (((buyer_rate_dc-rate)*(pounds-admin_charges))/ buyer_rate_dc),(((buyer_rate_dc-rate)*(pounds-admin_charges))/buyer_rate_dc))/' . $rate . ')+SUM(IF(sending_country="United Kingdom",(admin_charges),(admin_charges/' . $rate . ') )) AS fx_loss');
    }

    public function getTotalRevenueInGbp($rate){
      return  DB::raw(
            'SUM(
            IF(sending_country="United Kingdom",
            (
            (buyer_rate_dc-rate)*(pounds-admin_charges)
            / buyer_rate_dc),
            (
            (buyer_rate_dc-rate)*(pounds-admin_charges)
            /buyer_rate_dc
            /'.$rate.'
            )
            )
            ) +
             SUM(IF(agent_name="SSRL",((admin_charges/'.$rate.')-(admin_charges/'.$rate.')),(admin_charges/'.$rate.')))
             AS total_revenue_in_gbp');
    }
}
