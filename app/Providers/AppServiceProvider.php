<?php

namespace App\Providers;

use App\Contracts\GreeteInterface;
use App\Repositories\GreetRepository;
use App\Services\GreetService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GreetService::class, function (Application $app) {
            return new GreetService($app->make(GreetRepository::class));
        });

        $this->app->bind(GreeteInterface::class, GreetService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
