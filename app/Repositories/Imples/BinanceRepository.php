<?php

namespace App\Repositories\Imples;

use App\Repositories\Interfaces\IBinanceRepository;
use App\Services\Socket\ISocketService;
use Illuminate\Support\Facades\Cache;

class BinanceRepository implements IBinanceRepository
{
    public function getPrice()
    {
        dd(444444444);
    }

    public function savePrice()
    {
        dd(11);

        dd(Cache::get('prices'));
    }
}