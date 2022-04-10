<?php

namespace App\Repositories\Imples;

use App\Jobs\BinanceJob;
use App\Models\Order;
use App\Repositories\Interfaces\IBinanceRepository;

class BinanceRepository implements IBinanceRepository
{
    public function getPrice()
    {
        Order::all();
    }

    public function savePrice($input)
    {
        $result = json_decode($input->data);
        BinanceJob::dispatch($result);
    }
}
