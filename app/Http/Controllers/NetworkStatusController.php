<?php

namespace App\Http\Controllers;

use App\Services\NetworkStatusService;

class NetworkStatusController extends Controller
{
    private $service;

    public function __construct(NetworkStatusService $service)
    {
        $this->service = $service;
    }

    public function get()
    {
        return $this->service->getNetworkStatus();
    }
}
