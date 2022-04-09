<?php

namespace App\Repositories\Imples;

use App\Jobs\BinanceJob;
use App\Repositories\Interfaces\IBinanceRepository;

class BinanceRepository implements IBinanceRepository
{
    public function getPrice()
    {
        //
    }

    public function savePrice($input)
    {
        $result = json_decode($input->data);
        BinanceJob::dispatch($result);
    }
}
