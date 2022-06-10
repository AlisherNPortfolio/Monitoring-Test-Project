<?php

namespace App\Services;

use App\Classes\TopActiveSessionSvfManager;

class TopActiveSessionSvfService
{

    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new TopActiveSessionSvfManager($this->path);
    }

    public function getSvfData()
    {
        // $this->configParams();

        return $this->manager->getData();
    }

    public function saveSvfData()
    {
        return $this->manager->saveData();
    }

    private function configParams()
    {
        $this->manager->searchTimeName = 'some_time';
    }
}
