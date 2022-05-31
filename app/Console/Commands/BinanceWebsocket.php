<?php

namespace App\Console\Commands;

use App\Events\OrderBookEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use WebSocket\Client;

class BinanceWebsocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'binance:websocket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client("wss://stream.binance.com:9443/ws/btcusdt@bookTicker");
        while (true) {
            try {
                $result = $client->receive();
                error_log($result);
                Redis::publish('test-channel', json_encode([
                    'data' => ($result)
                ]));
            } catch (\WebSocket\ConnectionException $e) {
                echo $e;
            }
            sleep(10);
        }

        $client->close();
    }
}
