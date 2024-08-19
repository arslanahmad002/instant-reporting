<?php

namespace App\Jobs;

use App\Traits\Transactions;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessD2Transactions implements ShouldQueue
{
    use   Dispatchable, InteractsWithQueue, Queueable, SerializesModels,Transactions;


    /**
     * Create a new job instance.
     */

    public  $data;
    public function __construct( $data)
    {
        $this->data = $data;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $this->createTransaction($this->data);
    }
}
