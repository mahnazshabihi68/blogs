<?php

namespace App\Providers;

use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;
use Illuminate\Support\ServiceProvider;

class BlogRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        return $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
