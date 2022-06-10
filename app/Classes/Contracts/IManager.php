<?php

namespace App\Classes\Contracts;

interface IManager
{
    public function getApiData(): void;

    public function getData();

    public function saveData();

    public function beforeSave(): void;

    public function afterSave(): void;

    public function beforeGet(): void;

    public function afterGet(): void;
}
