<?php

namespace App\Services;

use App\Classes\TransactionManager;

class TransactionService
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new TransactionManager($this->path);
    }

    public function getTransaction()
    {
        $this->configParams();

        return $this->manager->getData();
    }

    public function saveTransactionIntoDb()
    {
        return $this->manager->saveData();
    }

    private function configParams()
    {
        $this->manager->searchTimeName = 'some_time';
    }
}
