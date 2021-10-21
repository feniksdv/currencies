<?php

namespace Database\Seeders;

use App\Models\CurrencyRate;
use Illuminate\Database\Seeder;

class CurrencyRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(CurrencyRate $currencyRate)
    {
        $currencyRate->insert($this->getData());
    }

    public function getData(): array
    {
        $arrayCurrencyRates = [
            [
                'from' => 'RUB',
                'to' => 'USD',
                'rate' => 709904,
                'multiplier' => 0.0001,
            ],
            [
                'from' => 'RUB',
                'to' => 'EUR',
                'rate' => 826399,
                'multiplier' => 0.0001,
            ],
            [
                'from' => 'USD',
                'to' => 'RUB',
                'rate' => 14,
                'multiplier' => 0.001,
            ],
            [
                'from' => 'USD',
                'to' => 'EUR',
                'rate' => 86,
                'multiplier' => 0.01,
            ],
            [
                'from' => 'EUR',
                'to' => 'USD',
                'rate' => 116,
                'multiplier' => 0.01,
            ],
            [
                'from' => 'EUR',
                'to' => 'RUB',
                'rate' => 12,
                'multiplier' => 0.001,
            ],
        ];
        $data = [];
        foreach ($arrayCurrencyRates as $arrayCurrencyRate) {
            $data[] = [
                'from' => $arrayCurrencyRate['from'],
                'to' => $arrayCurrencyRate['to'],
                'rate' => $arrayCurrencyRate['rate'],
                'multiplier' => $arrayCurrencyRate['multiplier'],
            ];
        }
        return $data;
    }
}
