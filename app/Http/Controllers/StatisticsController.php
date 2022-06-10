<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function sw_quais(Request $request)
    {
        return view('pages.sw_quais');
    }

    public function transactions(Request $request)
    {
        return view('pages.transactions');
    }

    public function details()
    {
        return view('pages.details');
    }
}
