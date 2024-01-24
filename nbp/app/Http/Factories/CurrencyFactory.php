<?php


namespace App\Http\Factories;

use App\Http\Interfaces\CurrencyFactoryInterface;
use App\Models\Currency;
use Illuminate\Support\Str;

class CurrencyFactory implements CurrencyFactoryInterface
{
    public function create(string $code, string $name, float $rate): Currency
    {
        $currency = new Currency();
        $currency->id = (string) Str::uuid();
        $currency->code = $code;
        $currency->name = $name;
        $currency->rate = $rate;
        $currency->save();

        return $currency;
    }
}
