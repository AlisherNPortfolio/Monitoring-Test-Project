<?php

namespace App\Classes\Traits;

use Illuminate\Support\Facades\Log;

trait InfoTrait {

    public function retryAPIInfo()
    {
        $url = $this->getApiUrl();
        Log::channel('monitoringlog')->info("Data could not be get from " . $url . " API. Retrying method has been triggered!");
    }

    public function saveModelDataInfo(\Exception $e = null, $isInCatch = false)
    {
        if ($isInCatch) {
            Log::channel('monitoringlog')->error($this->getApiUrl() . ' API data could not be saved.');
            Log::channel('monitoringlog')->error('Cause: ' . $e->getMessage());
        } else {
            Log::channel('monitoringlog')->info($this->getApiUrl() . ' API data saved');
        }
    }

    public function saveInfo(\Exception $e)
    {
        $modelName = $this->getModelData();
        $time = date('Y-m-d H:i:s');
        $errorMsg = "{$modelName->getName()} could not be saved!";

        Log::channel('monitoringlog')->error("Error: " . $errorMsg . "\nSystem Error: {$e->getMessage()}\nError time: {$time}");
    }
}