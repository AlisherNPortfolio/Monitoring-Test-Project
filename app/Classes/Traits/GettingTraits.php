<?php

namespace App\Classes\Traits;

trait GettingTraits
{
    public function get()
    {
        $from = $this->fromTime;

        $to = $this->toTime;

        $data = $this->model::query()
            ->whereBetween($this->searchTimeName, [$from, $to]);

        if ($this->orderByColumn && $this->orderBy) {
            $data->orderBy($this->orderByColumn, $this->orderBy);
        }

        if ($this->hasPagination) {
            $data = $data->paginate($this->perPage);
        } else {
            $data = $data->get();
        }

        return response()->json([
            'from' => $from,
            'to' => $to,
            'data' => $data
        ]);
    }
}
