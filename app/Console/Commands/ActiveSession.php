<?php

namespace App\Console\Commands;

use App\Services\TopActiveSessionService;
use Illuminate\Console\Command;

class ActiveSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'active-session:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and save active session';

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
    public function handle(TopActiveSessionService $service)
    {
        $service->setActiveSession();
    }
}
