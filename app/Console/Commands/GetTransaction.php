<?php

namespace App\Console\Commands;

use App\Services\TransactionService;
use Illuminate\Console\Command;

class GetTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and set transaction data from an API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(TransactionService $service)
    {
        $service->saveTransactionIntoDb();
    }
}
