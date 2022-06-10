<?php

namespace App\Http\Controllers;

use App\Services\MapService;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index');
    }

    public function get_map_data(MapService $mapService)
    {
        return $mapService->getMaps();
    }
}
