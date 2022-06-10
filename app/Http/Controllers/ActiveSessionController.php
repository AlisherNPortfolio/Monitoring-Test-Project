<?php

namespace App\Http\Controllers;

use App\Services\TopActiveSessionService;
use App\Services\TopActiveSessionSvfService;
use App\Services\SomeTest1Service;
use App\Services\SomeTest2Service;

class ActiveSessionController extends Controller
{
    public function getSvbo(TopActiveSessionService $service)
    {
        return $service->getActiveSessions();
    }

    public function getSvfe(TopActiveSessionSvfService $service)
    {
        return $service->getSvfData();
    }

    public function getIpsSvbo(SomeTest1Service $service)
    {
        return $service->getSvboData();
    }

    public function getIpsSvfe(SomeTest2Service $service)
    {
        return $service->getIpsData();
    }
}
