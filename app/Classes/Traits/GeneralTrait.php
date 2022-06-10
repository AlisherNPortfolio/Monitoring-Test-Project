<?php

namespace App\Classes\Traits;

use ReflectionClass;
use Illuminate\Support\Carbon;

trait GeneralTrait
{
    public function beforeSave(): void
    {
        $this->checkModelExist();

        $this->getApiData();

        $this->checkApiData();
    }

    public function afterSave(): void
    {
    }

    public function beforeGet(): void
    {
        $this->setCurrentTime();

        $this->fromTime();

        $this->toTime();
    }

    public function afterGet(): void
    {
    }

    protected function getResult(string $response)
    {
        return json_decode($response, true);
    }

    private function getModelData()
    {
        return new ReflectionClass($this->model);
    }

    public function fromTime()
    {
        $this->fromTime = $this->now->format(self::STANDARD_TIME_FORMAT);
    }

    public function toTime()
    {
        $this->toTime = $this->now->format(self::STANDARD_TIME_FORMAT);
    }

    protected function timeWithFormat($time)
    {
        if (($time = Carbon::createFromFormat(self::STANDARD_TIME_FORMAT, $time)) !== false) {
            return $time->format($this->searchTimeFormat);
        }
        throw new \Exception("Given value is not time");
    }
}
