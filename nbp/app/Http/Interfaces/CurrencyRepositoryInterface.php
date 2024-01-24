<?php

namespace App\Http\Interfaces;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepositoryInterface
{
    public function findByCode(string $code): ?Currency;
    public function findAll(): Collection;
}
