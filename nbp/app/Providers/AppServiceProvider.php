<?php

namespace App\Providers;

use App\Http\Clients\NbpClient;
use App\Http\Factories\CurrencyFactory;
use App\Http\Interfaces\CurrencyFactoryInterface;
use App\Http\Interfaces\CurrencyRepositoryInterface;
use App\Http\Interfaces\CurrencyServiceInterface;
use App\Http\Interfaces\NbpClientInterface;
use App\Http\Repositories\CurrencyRepository;
use App\Http\Services\CurrencyService;
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

        $this->app->bind(
            CurrencyServiceInterface::class,
            CurrencyService::class,
        );

        $this->app->bind(
            CurrencyRepositoryInterface::class,
            CurrencyRepository::class,
        );

        $this->app->bind(
            CurrencyFactoryInterface::class,
            CurrencyFactory::class,
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
