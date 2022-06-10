<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SomeTransactionService;

class SomeTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ips-transaction:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get ips transaction count data';

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
    public function handle(SomeTransactionService $service)
    {
        $service->saveSomeTransaction();
    }
}
