<?php

namespace App\Console\Commands;

use App\Http\Interfaces\CurrencyServiceInterface;
use Illuminate\Console\Command;

class UpdateCurrency extends Command
{
    protected $signature = 'app:update-currency';
    protected $description = 'Update currency rates';

    public function __construct(private CurrencyServiceInterface $currencyService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->currencyService->updateRates();
    }
}
