<?php

namespace App\Http\Interfaces;

interface CurrencyServiceInterface
{
    public function updateRates(): void;
}
