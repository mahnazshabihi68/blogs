<?php
 
namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
 
class RedisSubscribe extends Command
{
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
        Redis::subscribe(['test-channel'], function ($message) {
            // $message = json_decode($message);
            error_log($message);
            Order::create([
                'message' => $message,
            ]);
        });
    }
}