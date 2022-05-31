<?php

namespace App\Repositories\Imples;

use App\Jobs\BinanceJob;
use App\Models\Order;
use App\Repositories\Interfaces\IBinanceRepository;

class BinanceRepository implements IBinanceRepository
{
    public function getPrice()
    {
        return Order::all();
    }

    public function savePrice($input)
    {
        $result = json_decode($input->data);
        Order::create([
            'u' => $result->u,
            's' => $result->s,
            'b' => $result->b,
            'B' => $result->B,
            'a' => $result->a,
            'A' => $result->A
        ]);
//        BinanceJob::dispatch($result);
    }
}
