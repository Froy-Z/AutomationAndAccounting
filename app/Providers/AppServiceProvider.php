<?php

namespace App\Providers;

use App\Contracts\SocksServiceContract;
use App\Services\SocksService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SocksServiceContract::class, SocksService::class);
    }

    public function boot(): void
    {
        //
    }
}
