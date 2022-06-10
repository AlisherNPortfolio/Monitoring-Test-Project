<?php

namespace App\Console\Commands;

use App\Services\NetworkStatusService;
use Illuminate\Console\Command;

class GetNetworkStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'network:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get network status data';

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
    public function handle(NetworkStatusService $networkStatusService)
    {
        $networkStatusService->saveNetworkStatus();
    }
}
