<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use App\Services\SomeTransactionService;

class TransactionController extends Controller
{
    private $service;

    public function get_transaction_data(TransactionService $service)
    {
        return $service->getTransaction();
    }

    public function getSomeTransaction(SomeTransactionService $service)
    {
        return $service->getSomeTransaction();
    }
}
