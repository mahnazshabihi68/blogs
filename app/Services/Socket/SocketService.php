<?php

namespace App\Services\Socket;

use App\Models\Blog;
use App\Models\User;
use App\Services\Interfaces\IBinanceService;
use App\Services\Socket\ISocketService;
use Illuminate\Support\Facades\Redis;
use WebSocket\Client;

class SocketService implements ISocketService
{
    protected $dataPrice = 2;

    public function __construct($dataPrice)
    {
        $this->dataPrice = $dataPrice;
    }

    function getSocketData()
    {
        $client = new Client("wss://stream.binance.com:9443/ws/bnbbtc@bookTicker");

        while (true) {
            try {
                // $result = $client->receive();
                // if (!Redis::get('prices')) {
                //     Redis::set('prices', $result, 'EX', 1000);
                // } elseif(Redis::ttl('prices') == 995) {
                //     User::create(['prices', $result]);
                // }
            } catch (\WebSocket\ConnectionException $e) {
                echo $e;
            }
        }
        $client->close();
    }
}
