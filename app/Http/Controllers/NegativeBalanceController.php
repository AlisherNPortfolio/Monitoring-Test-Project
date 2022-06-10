<?php

namespace App\Http\Controllers;

use App\Services\NegativeBalanceService;

class NegativeBalanceController extends Controller
{
    private $service;

    public function __construct(NegativeBalanceService $service)
    {
        $this->service = $service;
    }

    public function save()
    {
        return $this->service->setNegativeBalance();
    }

    public function get()
    {
        return $this->service->getNegativeBalance();
    }
}
