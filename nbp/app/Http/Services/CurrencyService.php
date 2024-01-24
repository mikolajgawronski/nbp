<?php

namespace App\Http\Services;

use App\Http\Interfaces\CurrencyFactoryInterface;
use App\Http\Interfaces\CurrencyRepositoryInterface;
use App\Http\Interfaces\CurrencyServiceInterface;
use App\Http\Interfaces\NbpClientInterface;

class CurrencyService implements CurrencyServiceInterface
{
    public function __construct(
        private NbpClientInterface $nbpClient,
        private CurrencyRepositoryInterface $currencyRepository,
        private CurrencyFactoryInterface $currencyFactory,
    ) {}

    public function updateRates(): void
    {
        try {
            $response = $this->nbpClient->sendGet('/api/exchangerates/tables/A', [
                'format' => 'json',
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Error while fetching currency rates.');
        }

        $currencies = $response[0]['rates'];

        foreach ($currencies as $currency) {
            $currencyModel = $this->currencyRepository->findByCode($currency['code']);

            if ($currencyModel === null) {
                $this->currencyFactory->create(
                    $currency['code'],
                    $currency['currency'],
                    $currency['mid'],
                );

                continue;
            }

            $currencyModel->update([
                'rate' => $currency['mid'],
            ]);
        }
    }
}
