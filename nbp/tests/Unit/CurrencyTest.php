<?php

namespace Tests\Unit;

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
}
