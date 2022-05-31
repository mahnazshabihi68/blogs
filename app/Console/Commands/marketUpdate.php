<?php

namespace App\Console\Commands;

use App\Events\OrderBookEvent;
use App\Models\Order;
use App\Services\Imples\BinanceService;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class marketUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'market:update';

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
        while (true) {
            $result = Order::latest()->first();
            OrderBookEvent::dispatch($result);;
            sleep(10);
        }
    }
}
