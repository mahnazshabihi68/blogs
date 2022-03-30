<?php

namespace App\Providers;

use App\Repositories\Imples\BlogRepository;
use App\Repositories\Interfaces\IBlogRepository;
use App\Services\Imples\BlogService;
use App\Services\Interfaces\IBlogService;
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

