<?php

namespace App\Providers;

use App\Repositories\Imples\BinanceRepository;
use App\Repositories\Imples\BlogRepository;
use App\Repositories\Interfaces\IBinanceRepository;
use App\Repositories\Interfaces\IBlogRepository;
use App\Services\Imples\BinanceService;
use App\Services\Imples\BlogService;
use App\Services\Interfaces\IBinanceService;
use App\Services\Interfaces\IBlogService;
use App\Services\Socket\ISocketService;
use App\Services\Socket\SocketService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBlogRepository::class, BlogRepository::class);
        $this->app->bind(IBlogService::class, BlogService::class);
        $this->app->bind(IBinanceService::class, BinanceService::class);
        $this->app->bind(IBinanceRepository::class, BinanceRepository::class);
        $this->app->bind(ISocketService::class, SocketService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

