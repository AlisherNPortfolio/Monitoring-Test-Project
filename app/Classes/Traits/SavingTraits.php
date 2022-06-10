<?php

namespace App\Classes\Traits;

use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Log;

trait SavingTraits
{
    protected function save()
    {
        try {
            if ($this->isMultiple) {
                $this->saveMultiple($this->apiData);
            } else {
                $this->saveModelData($this->apiData);
            }
        } catch (\PDOException $e) {
            $this->saveInfo($e);

            $this->retryAPI();
        }
    }

    private function saveMultiple(array $apiData)
    {
        DB::beginTransaction();

        try {
            foreach ($apiData as $data) {
                $this->saveModelData($data);
            }
            DB::commit();
            Log::channel('monitoringlog')->info($this->getApiUrl() . ' API data saved');
            return 'Saved';
        } catch (PDOException $e) {
            DB::rollback();
            Log::channel('monitoringlog')->info("Error on saving multiple data. " . $e->getMessage());
            return $e->getMessage();
        }
    }

    public function saveModelData(array $data): void
    {
        try {
            $this->model::query()->create($data);
            $this->saveModelDataInfo();
            
        } catch (PDOException $e) {

            $this->saveModelDataInfo($e, true);
            $this->retryAPI();
        }
    }

    public function retryAPI(): void
    {
        $this->retryAPIInfo();
        $this->saveData();
    }
}
