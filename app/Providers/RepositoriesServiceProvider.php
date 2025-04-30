<?php

namespace App\Providers;

use App\Contracts\SocksRepositoryContract;
use App\Repositories\SocksRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SocksRepositoryContract::class, SocksRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
