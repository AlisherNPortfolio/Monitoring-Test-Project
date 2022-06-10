<?php

namespace App\Services;

use App\Classes\SomeTest1Manager;

class SomeTest1Service
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new SomeTest1Manager($this->path);
    }

    public function getSvboData()
    {
        // $this->configParams();
        return $this->manager->getData();
    }

    public function saveSvboData()
    {
        return $this->manager->saveData();
    }
}
