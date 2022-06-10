<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class MockTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:mock';

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
    public function handle()
    {
        $transaction = Transaction::query()
            ->select("* some fields")
            ->inRandomOrder()
            ->first()
            ->toArray();

        $time = Carbon::now();

        $trTime = ($time->hour < 10 ? '0' . $time->hour : $time->hour) . ($time->minute < 10 ? '0' . $time->minute : $time->minute);
        $transaction["time"] = $trTime;
        $transaction["some_time"] = $trTime;

        Log::info("Mock transaction created");
        Transaction::query()->create($transaction);
        return 0;
    }
}
