<?php

namespace App\Services\Imples;

use App\Jobs\BinnaceData;
use App\Repositories\Interfaces\IBinanceRepository;
use App\Services\Interfaces\IBinanceService;
use App\Services\Socket\SocketService;

class BinanceService extends SocketService implements IBinanceService
{
    protected $iBinanceRepository, $iSocketService;

    public function __construct(IBinanceRepository $iBinanceRepository)
    {
        $this->iBinanceRepository = $iBinanceRepository;
    }

    public function getPrice()
    {
        //
    }

    public function save($data)
    {
        dispatch(new BinnaceData($data));
        dd('finished');
    }
}
