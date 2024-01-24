<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CurrencyRepositoryInterface;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function findByCode(string $code): ?Currency
    {
        return Currency::query()->where('code', $code)->first();
    }

    public function findAll(): Collection
    {
        return Currency::all();
    }
}
