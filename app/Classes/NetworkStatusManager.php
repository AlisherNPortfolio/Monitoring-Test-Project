<?php

namespace App\Classes;

use App\Models\NetworkStatus;
use App\Classes\Base\DataManager;

class NetworkStatusManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = NetworkStatus::class;
    }

    public function fromTime()
    {
        $this->fromTime = $this->timeWithFormat($this->now->copy()->startOfDay());
    }

    public function toTime()
    {
        $this->toTime = $this->timeWithFormat($this->now->endOfDay());
    }
}
