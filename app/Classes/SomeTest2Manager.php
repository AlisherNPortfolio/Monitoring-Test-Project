<?php

namespace App\Classes;

use App\Classes\Base\DataManager;
use App\Models\SomeTest2;

class SomeTest2Manager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);
        $this->model = SomeTest2::class;
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
