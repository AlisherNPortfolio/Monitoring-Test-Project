<?php

namespace App\Services;

use App\Classes\NetworkStatusManager;
use Illuminate\Support\Carbon;
use App\Classes\Base\DataManager;

class NetworkStatusService
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new NetworkStatusManager($this->path);
    }

    public function getNetworkStatus()
    {
        $this->configParams();

        return $this->manager->getData();
    }

    public function saveNetworkStatus()
    {
        $this->manager->isMultiple = true;

        return $this->manager->saveData();
    }

    private function configParams()
    {
        $this->manager->searchTimeFormat = 'Y-m-d H:i:s';

        $now = Carbon::now();

        $this->manager->fromTime(function (&$time) use ($now) {
            $time = $now->copy()->startOfDay();
        });

        $this->manager->toTime(function (&$time) use ($now) {
            $time = $now->endOfDay();
        });

        $this->manager->setOrderBy('created_at', DataManager::ORDER_TYPE_DESC);

        $this->manager->setPagination(10);
    }
}
