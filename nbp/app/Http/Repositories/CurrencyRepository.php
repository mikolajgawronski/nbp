<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CurrencyRepositoryInterface;
use App\Models\Currency;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function findByCode(string $code): ?Currency
    {
        return Currency::query()->where('code', $code)->first();
    }
}
