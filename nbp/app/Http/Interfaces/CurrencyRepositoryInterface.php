<?php

namespace App\Http\Interfaces;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function findByCode(string $code): ?Currency;
}
