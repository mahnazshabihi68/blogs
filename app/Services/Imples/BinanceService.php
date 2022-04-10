<?php

namespace App\Services\Imples;

use App\Repositories\Interfaces\IBinanceRepository;
use App\Services\Interfaces\IBinanceService;
use App\Services\Socket\SocketService;
use Illuminate\Support\Facades\Cache;

class BinanceService extends SocketService implements IBinanceService
{
    protected $iBinanceRepository, $iSocketService;

    public function __construct(IBinanceRepository $iBinanceRepository)
    {
        $this->iBinanceRepository = $iBinanceRepository;
    }

    public function getPrice()
    {
        return Cache::remember('orders', config('orders_update'), function () {
            return $this->iBinanceRepository->getPrice();
        });
    }

    public function save($input)
    {
        $this->iBinanceRepository->savePrice($input);
    }
}
