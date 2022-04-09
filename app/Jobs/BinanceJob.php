<?php

namespace App\Jobs;

use App\Models\Blog;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class BinanceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        error_log(324324);
        Order::create([
            'u' => $this->data->u,
            's' => $this->data->s,
            'b' => $this->data->b,
            'B' => $this->data->B,
            'a' => $this->data->a,
            'A' => $this->data->A
        ]);
      

        
    }
}
