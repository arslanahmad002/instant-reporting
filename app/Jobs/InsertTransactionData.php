<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;

class InsertTransactionData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::disableQueryLog();
        LazyCollection::make(function() {
            $handle = fopen(Storage::path("transactions_files/".$this->file_name), 'r');
            while(($row = fgetcsv($handle,10000)) != false ) {
                yield $row;
            }
            fclose($handle);
        })
        ->skip(1)
        ->chunk(500)
        ->each(function(LazyCollection $chunk) {
            $records = $chunk->map(function($row) {
                return [
                    'Transaction Date' => $row[0],
                    'Transaction Time' => $row[1],
                    'Agent_ID_Collect' => $row[2],
                    'Agent_Name_Collect' => $row[3],
                    'Type' => $row[4],
                    'Agent_ID_Main' => $row[5],
                    'Agent_Name_Main' => $row[6],
                    'Office ID' => $row[7],
                    'Tr_No' => $row[8],
                    'PIN_No' => $row[9],
                    'Customer ID' => $row[10],
                    'Customer Full Name' => $row[11],
                    'Customer First Name' => $row[12],
                    'Customer Last Name' => $row[13],
                    'House no' => $row[14],
                    'Street' => $row[15],
                    'City' => $row[16],
                    'Post Code' => $row[17],
                    'Customer_State' => $row[18],
                    'Customer_Country' => $row[19],
                    'Customer_Tel' => $row[20],
                    'Customer_Cell' => $row[21],
                    'Customer_Email' => $row[22],
                    'Customer_MotherName' => $row[23],
                    'ID Type' => $row[24],
                    'ID Number' => $row[25],
                    'ID Issue' => $row[26],
                    'ID Expiry' => $row[27],
                    'Customer_ID_Issue_Place' => $row[28],
                    'Nationality' => $row[29],
                    'Customer_Gender' => $row[30],
                    'DOB' => $row[31],
                    'Birth_Place' => $row[32],
                    'Profession' => $row[33],
                    'Agent_ID_Pay' => $row[34],
                    'Agent_Name_Pay' => $row[35],
                    'Payment Method' => $row[36],
                    'Beneficiary Country' => $row[37],
                    'Customer Rate' => $row[38],
                    'Agent RATE' => $row[39],
                    'PayOut_CCY' => $row[40],
                    'Amount' => $row[41],
                    'PayIN_CCY' => $row[42],
                    'PayIN_Amt' => $row[43],
                    'Admin Charges' => $row[44],
                    'Agent Charges' => $row[45],
                    'Beneficiary Full Name' => $row[46],
                    'Beneficiary First Name' => $row[47],
                    'Beneficiary Last Name' => $row[48],
                    'Receiver Address' => $row[49],
                    'Receiver City' => $row[50],
                    'Receiver Phone' => $row[51],
                    'Receiver Email' => $row[52],
                    'Receiver Date of Birth' => $row[53],
                    'Receiver Place of Birth' => $row[54],
                    'Bank A/C #' => $row[55],
                    'Bank Name' => $row[56],
                    'Branch Name' => $row[57],
                    'Branch Code' => $row[58],
                    'Purpose_Category' => $row[59],
                    'Purpose_Comments' => $row[60],
                    'Status' => $row[61],
                    'Exported' => $row[62],
                    'Main Hold' => $row[63],
                    'Subadmin Hold' => $row[64],
                    'Paid Date' => $row[65],
                    'Paid Time' => $row[66],
                    'Buyer Rate' => $row[67],
                    'SubAgent Rate' => $row[68],
                    'Codice Fiscale' => $row[69],
                    'Beneficiary CNIC' => $row[70],
                    'Brnch Name' => $row[71],
                    'Brnch Code' => $row[72],
                    'Buyer Name' => $row[73],
                    'Total Transaction' => $row[74],
                    'Total Amount' => $row[75],
                    'Relationship' => $row[76],
                    'Payment SMethod' => $row[77],
                    'Payment Type' => $row[78],
                    'TMT NO' => $row[79],
                    'Buyer DC Rate' => $row[80],
                    'Customer Register Date' => $row[81],
                    'Customer ID 1' => $row[82],
                    'Customer ID 2' => $row[83],
                    'log Export Date' => $row[84],
                    'Registered By' => $row[85],
                    'Transaction By Device' => $row[86],
                    'Merchant Refernace' => $row[87],
                    'First Transaction Date' => $row[88],
                    'Last Transaction Date' => $row[89],
                    'SUMSUB Verified' => $row[90],
                    'LogID' => $row[91],
                    'Sender Status' => $row[92],
                ];
            })->toArray();
            DB::table("transactions_data")->insert($records);
        })
        ;
        // $file = Storage::get("transactions_files/".$this->file_name);
        // collect($this->data)->chunk(100)->each(function($chunk) {
        //     DB::table('transactions_data')->insert($chunk->all());
        // });
    }
}
