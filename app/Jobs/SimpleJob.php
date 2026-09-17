<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SimpleJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    // In questo caso andiamo ad inserire un nuovo log semplice con un messaggio all'interno
    protected string $message;

    /**
     * Create a new job instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Esecuzione del SimpleJob: ' . $this->message);
    }
}
