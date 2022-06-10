<?php

namespace App\Services;

use App\Classes\NegativeBalanceManager;

class NegativeBalanceService
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new NegativeBalanceManager($this->path);
    }

    public function setNegativeBalance()
    {
        return $this->manager->saveData();
    }

    public function getNegativeBalance()
    {
        return $this->manager->getData();
    }
}
