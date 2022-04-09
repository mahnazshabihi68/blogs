<?php

namespace App\Console\Commands;

use App\Services\Interfaces\IBinanceService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisSubscribe extends Command
{
    public function __construct(IBinanceService $iBinanceService)
    {
        parent::__construct();
        $this->iBinanceService = $iBinanceService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to a Redis channel';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Redis::subscribe(['test-channel'], function ($response) {
            $value = json_decode($response);
            $this->iBinanceService->save($value);
        });
    }
}
