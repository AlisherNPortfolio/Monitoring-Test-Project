<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SomeTest1Service;
use Illuminate\Support\Facades\Log;

class GetSomeTest1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'svbo:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get top active session some 1 data';

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
    public function handle(SomeTest1Service $service)
    {
        try {
            $service->saveSvboData();
        } catch (\Exception $e) {
            Log::info("Xatolik: " . $e->getMessage());
        }
    }
}
