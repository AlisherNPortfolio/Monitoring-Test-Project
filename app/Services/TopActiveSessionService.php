<?php

namespace App\Services;

use App\Classes\TopActiveSessionManager;

class TopActiveSessionService
{
    private $path = "/some/api/url";

    private $manager;

    public function __construct()
    {
        return $this->manager = new TopActiveSessionManager($this->path);
    }

    public function getActiveSessions()
    {
        return $this->manager->getData();
    }

    public function setActiveSession()
    {
        $this->manager->saveData();
    }
}
