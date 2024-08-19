<?php

namespace App\Http\Livewire\Transactions;

use App\Jobs\InsertTransactionData;
use App\Jobs\ProcessD2Transactions;
use App\Models\TransactionFile;
use App\Models\TransactionsData;
use App\traits\Transactions;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadTransactionData extends Component
{
    use WithFileUploads,Transactions;
    public $transaction_file;
    public $showLoading = false;
    protected  $rules = [
        'transaction_file' => 'required|mimes:csv,txt',
    ];

    protected  $messages = [
        'transaction_file.required' => 'Please upload transaction data  csv file',
        'transaction_file.max' => 'Transaction data file should be less than 100MB',
        'transaction_file.mimes' => 'Transaction data file should be in csv format',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.transactions.upload-transaction-data');
    }

    public  function save(){
        $this->showLoading = true;
        $this->validate([
            'transaction_file' => 'required|mimes:csv,txt', // 100MB Max
        ]);
        $file_name =  'transaction_file_'.(string) Str::uuid().'csv';
        $this->transaction_file->storeAs('transactions_files',$file_name);
        InsertTransactionData::dispatch($file_name);
        TransactionFile::create([
            'date' => now(),
            'file_name' => $this->transaction_file->getClientOriginalName()
        ]);
        // $file_name = "transactions_files/".$file_name;
        // $data = $this->processTransactionFile($file_name);
        // $this->createTransaction($data);
//        $chunks = array_chunk($data,1000);
//        foreach ($chunks as $key => $chunk){
//            ProcessD2Transactions::dispatch($chunk);
//        }
        session()->flash('message', 'Transaction Data uploaded successfully');
        $this->showLoading = false;

    }
}
