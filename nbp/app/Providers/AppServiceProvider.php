<?php

namespace App\Providers;

use App\Http\Clients\NbpClient;
use App\Http\Interfaces\NbpClientInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            NbpClientInterface::class,
            NbpClient::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
