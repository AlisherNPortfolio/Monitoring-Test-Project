<?php

namespace App\Services;

use App\Classes\SomeTest2Manager;

class SomeTest2Service
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new SomeTest2Manager($this->path);
    }

    public function getIpsData()
    {
        // $this->configParams();
        return $this->manager->getData();
    }

    public function saveIpsData()
    {
        return $this->manager->saveData();
    }
}
