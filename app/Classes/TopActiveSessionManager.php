<?php

namespace App\Classes;

use App\Classes\Base\DataManager;
use App\Models\TopActiveSession;
use Faker\Provider\Base;

class TopActiveSessionManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = TopActiveSession::class;
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
