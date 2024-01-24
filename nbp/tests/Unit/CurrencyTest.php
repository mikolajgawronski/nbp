<?php

namespace Tests\Unit;

use App\Http\Interfaces\CurrencyFactoryInterface;
use App\Http\Interfaces\CurrencyRepositoryInterface;
use App\Http\Interfaces\CurrencyServiceInterface;
use App\Http\Interfaces\NbpClientInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    use RefreshDatabase;

    private NbpClientInterface $nbpClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->nbpClient = $this->app->make(NbpClientInterface::class);
        $this->currencyRepository = $this->app->make(CurrencyRepositoryInterface::class);
        $this->currencyFactory = $this->app->make(CurrencyFactoryInterface::class);
        $this->currencyService = $this->app->make(CurrencyServiceInterface::class);
    }

    public function test_fail_fetching_fake_endpoint(): void
    {
        $response = $this->nbpClient->sendGet('/api/fake-endpoint');

        self::assertNull($response);
    }

    public function test_fetching_currency_rates(): void
    {
        $response = $this->nbpClient->sendGet('/api/exchangerates/tables/A', [
            'format' => 'json',
        ]);

        self::assertIsArray($response);
    }

    public function test_factory_create_currency(): void
    {
        $result = $this->currencyFactory->create('ABC', 'Fake Testing Currency', 1.0);
        self::assertNotNull($result);
    }

    public function test_fail_find_currency_by_code(): void
    {
        $result = $this->currencyRepository->findByCode('XYZ');
        self::assertNull($result);
    }

    public function test_update_currency_rates(): void
    {
        $countPreUpdate = $this->currencyRepository->findAll()->count();
        $this->currencyService->updateRates();
        $countPostUpdate = $this->currencyRepository->findAll()->count();
        self::assertGreaterThan($countPreUpdate, $countPostUpdate);
    }
}
