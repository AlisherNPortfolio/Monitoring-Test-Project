<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SomeTest2Service;

class GetSomeTest2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ips:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Top Active Session some data';

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
    public function handle(SomeTest2Service $service)
    {
        $service->saveIpsData();
    }
}
