<?php

namespace App\Classes;

use App\Models\Country;
use App\Models\Map;
use App\Classes\Base\DataManager;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use PDOException;

class MapManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = Map::class;
    }

    public function saveModelData(array $data): void
    {
        $country = Country::query()->select('lat', 'long')->where('numcode', $data['code'])->first();

        if (!$country) {
            throw new \Exception("Country not found");
        }

        $data['lat'] = $country->lat;
        $data['long'] = $country->long;
        $data['date'] = Carbon::createFromFormat('d.m.Y', $data['date'])->format($this->searchTimeFormat);

        try {
            $this->model::query()->create($data);
        } catch (PDOException $e) {
            Log::info($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function fromTime()
    {
        $this->fromTime = $this->timeWithFormat($this->now->copy()->subDay()->startOfDay());
    }

    public function toTime()
    {
        $this->toTime = $this->timeWithFormat($this->now->subDay()->endOfDay());
    }
}
