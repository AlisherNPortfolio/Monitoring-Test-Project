<?php

namespace App\Classes;

use App\Classes\Base\DataManager;
use App\Models\SomeTransaction;

class SomeTransactionManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = SomeTransaction::class;
    }

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
