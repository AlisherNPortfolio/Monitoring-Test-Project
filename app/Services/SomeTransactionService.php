<?php

namespace App\Services;

use App\Classes\SomeTransactionManager;

class SomeTransactionService
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new SomeTransactionManager($this->path);
    }

    public function getSomeTransaction()
    {
        return $this->manager->getData();
    }

    public function saveSomeTransaction()
    {
        return $this->manager->saveData();
    }
}
