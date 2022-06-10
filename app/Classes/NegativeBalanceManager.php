<?php

namespace App\Classes;

use App\Classes\Base\DataManager;
use App\Models\NegativeBalance;
use Illuminate\Support\Facades\Log;
use PDOException;

class NegativeBalanceManager extends DataManager
{
    public function __construct(string $path)
    {
        $this->config($path);

        $this->model = NegativeBalance::class;
        $this->searchTimeName = 'full_time';
    }

    public function saveModelData(array $data): void
    {
        if ($this->checkData($data)) {
            $time = explode(" ", $data['time']);
            try {
                $this->model::query()->create([
                    'time1' => date('Y-m-d', strtotime($time[0])),
                    'time2' => date('H:i:s', strtotime($time[1])),
                    'sum' => $data['amount'],
                    'count' => $data['count'],
                    'full_time' => date('Y-m-d H:i:s', strtotime($data['time']))
                ]);
            } catch (PDOException $e) {
                Log::info("Error:" . $e->getMessage() . "Time: " . date('Y-m-d H:i:s'));
                throw new PDOException($e->getMessage());
            }
        } else {
            Log::info("Data is empty:" . serialize($data) . "Time: " . date('Y-m-d H:i:s'));
        }
    }

    public function checkData(array $data)
    {
        $isValid = true;

        foreach ($data as $item) {
            if ($item === null || $item === 0) {
                $isValid = false;
                break;
            }
        }
        return $isValid;
    }

    public function fromTime()
    {
        $this->fromTime = $this->now->copy()->subDays(7)->format(self::STANDARD_TIME_FORMAT);
    }
}
