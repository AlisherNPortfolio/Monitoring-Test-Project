<?php

namespace App\Services;

use App\Classes\MapManager;

class MapService
{
    private $path = '/some/api/url';
    private $manager;

    public function __construct()
    {
        $this->manager = new MapManager($this->path);

        $this->manager->searchTimeFormat = 'Y-m-d H:i:s';
    }

    public function getMaps()
    {
        $this->manager->searchTimeName = 'date';

        return $this->manager->getData();
    }

    public function saveMaps()
    {
        $this->manager->isMultiple = true;

        return $this->manager->saveData();
    }
}
