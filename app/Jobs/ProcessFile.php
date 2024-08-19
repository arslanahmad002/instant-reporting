<?php

namespace App\Jobs;
use App\Traits\Transactions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\ProcessD2Transactions;
use Illuminate\Support\Facades\Bus;

class ProcessFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,Transactions;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $file_name)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->processTransactionFile($this->file_name);
        $chunks = array_chunk($data,1000);

//        $batch = Bus::batch([])->dispatch();
        foreach ($chunks as $key => $chunk){
//            $batch->add( new ProcessD2Transactions($chunk));
            ProcessD2Transactions::dispatch($chunk);
        }
    }
}
