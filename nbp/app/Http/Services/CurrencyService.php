<?php

namespace App\Http\Services;

use App\Http\Interfaces\CurrencyServiceInterface;
use App\Http\Interfaces\NbpClientInterface;

class CurrencyService implements CurrencyServiceInterface
{
    public function __construct(
        private NbpClientInterface $nbpClient,
    ) {}

    public function updateRates(): void
    {
        echo 123;
    }
}
