<?php

namespace App\Classes;

use App\Models\Transaction;
use App\Classes\Base\DataManager;

class TransactionManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = Transaction::class;
    }

    // public function get()
    // {
    //     $from = Carbon::createFromFormat('Y-m-d H:i', $this->fromTime)->format('Y-m-d H:i:s');
    //     $to = Carbon::createFromFormat('Y-m-d H:i', $this->toTime)->format('Y-m-d H:i:s');
    //     $test = $this->model::query()
    //         // ->latest()
    //         // ->limit(10)
    //         ->whereBetween('hh_time', [$to, $from])
    //         ->toSql();
    //     dd($from, $to);
    // }

    public function beforeSave(): void
    {
        parent::beforeSave();

        $this->apiData['some_time'] = $this->apiData['some'];
    }

    public function fromTime()
    {
        $this->fromTime = $this->now->copy()->subHour()->format(self::STANDARD_TIME_FORMAT);
    }

    public function toTime()
    {
        $this->toTime = $this->now->format(self::STANDARD_TIME_FORMAT);
    }
}
