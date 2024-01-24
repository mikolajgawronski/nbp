<?php

namespace App\Http\Interfaces;

use App\Models\Currency;

interface CurrencyFactoryInterface
{
    public function create(string $code, string $name, float $rate): Currency;
}
