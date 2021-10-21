<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Currency $currency)
    {
        $currency->insert($this->getData());
    }

    public function getData(): array
    {
        $arrayCurrencies = [
            [
                'iso' => 'RUB',
                'name' => '[{"ru":"Российский рубль", "en":"Russian rouble", "es":"Rublo ruso"}]',
                'symbol' => 'U+20BD',
            ],
            [
                'iso' => 'USD',
                'name' => '[{"ru":"Доллар США", "en":"US dollar", "es":"Dólar estadounidense"}]',
                'symbol' => 'U+0024',
            ],
            [
                'iso' => 'EUR',
                'name' => '[{"ru":"Евро", "en":"Euro", "es":"Euro"}]',
                'symbol' => 'U+20AC',
            ]
        ];
        $data = [];
        foreach ($arrayCurrencies as $arrayCurrency) {
            $data[] = [
                'iso' => $arrayCurrency['iso'],
                'name' => $arrayCurrency['name'],
                'symbol' => $arrayCurrency['symbol'],
            ];
        }

        return $data;
    }
}
