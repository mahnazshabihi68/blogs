<?php

namespace App\Repositories\Imples;

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
        foreach ($data as $key => $value) {
            Redis::publish('test-channel', json_encode([
                'data' => $value
            ]));
        }
    }
}
