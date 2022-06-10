<?php

namespace App\Console\Commands;

use App\Services\NegativeBalanceService;
use Illuminate\Console\Command;

class GetNegativeBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'negative:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get negative balance';

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
    public function handle(NegativeBalanceService $negativeBalanceService)
    {
        $negativeBalanceService->setNegativeBalance();
    }
}
