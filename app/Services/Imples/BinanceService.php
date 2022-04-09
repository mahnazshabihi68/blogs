<?php

namespace App\Services\Imples;

use App\Events\ExpireDate;
use App\Models\Blog;
use App\Models\User;
use App\Repositories\Interfaces\IBinanceRepository;
use App\Services\Interfaces\IBinanceService;
use App\Services\Socket\ISocketService;
use App\Services\Socket\SocketService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use WebSocket\Client;

class BinanceService extends SocketService implements IBinanceService
{
    protected $iBinanceRepository, $iSocketService;

    public function __construct(IBinanceRepository $iBinanceRepository)
    {
        $this->iBinanceRepository = $iBinanceRepository;
    }

    public function getPrice()
    {
        $client = new Client("wss://stream.binance.com:9443/ws/bnbbtc@bookTicker");
        // Redis::set('time', 6);
        while (true) {
            try {
                $result = ($client->receive());
                // $order = [
                //     'u' => $result->u,
                //     's' => $result->s,
                //     'b' => $result->b,
                //     'B' => $result->B,
                //     'a' => $result->a,
                //     'A' => $result->A
                // ];
                Redis::publish('test-channel', json_encode([
                    'name' => $result
                ]));
                error_log($result);

               
            } catch (\WebSocket\ConnectionException $e) {
                echo $e;
            }
            error_log(1111);

        }
        error_log(888);

        $client->close();
    }

    public function save()
    {
        $this->iBinanceRepository->savePrice();
    }
}
