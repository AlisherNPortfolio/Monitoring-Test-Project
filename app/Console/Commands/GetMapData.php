<?php

namespace App\Console\Commands;

use App\Services\MapService;
use Illuminate\Console\Command;

class GetMapData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(MapService $mapService)
    {
        $mapService->saveMaps();
    }
}
