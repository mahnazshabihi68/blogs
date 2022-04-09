<?php

namespace App\Repositories\Imples;

use App\Jobs\BinanceJob;
use App\Models\Order;
use App\Repositories\Interfaces\IBinanceRepository;
use App\Services\Socket\ISocketService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BinanceRepository implements IBinanceRepository
{
    public function getPrice()
    {
        //
    }

    public function savePrice($data)
    {
        $result = json_decode($data->data);
        BinanceJob::dispatch($result);
    }
}
