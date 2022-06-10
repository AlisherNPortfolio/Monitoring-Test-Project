<?php

namespace App\Classes;

use App\Classes\Base\DataManager;
use App\Models\TopActiveSessionSvf;
use Faker\Provider\Base;

class TopActiveSessionSvfManager extends DataManager {

    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = TopActiveSessionSvf::class;
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