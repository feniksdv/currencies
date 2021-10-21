<?php

namespace App\Services\Api;

use App\Contracts\Api\ApiCurrencyConversion;
use App\Models\Currency;
use App\Models\CurrencyRate;
use Illuminate\Http\JsonResponse;

class ApiCurrencyConversionService implements ApiCurrencyConversion
{
    /**
     * Выдаем пользователю курс валюты в формате Json
     *
     * @param $user_currency
     * @return JsonResponse
     */
    public function getCurrencyValue($user_currency): JsonResponse
    {
        //получаем массив из Таблицы Currency
        $modelCurrencies = Currency::get('iso')->toArray();
        //Приводим массив к нужному виду
        $arrayCurrency = [];
        foreach ($modelCurrencies as $modelCurrency) {
            $arrayCurrency[] = $modelCurrency['iso'];
        }
        //Преобразуем все строчные буквы в заглавные
        $user_currency = strtoupper($user_currency);
        //Проверяем что пришел верный запрос, иначе выдать ошибку.
        if (in_array($user_currency, $arrayCurrency, true)) {
            $modelCurrencyRates = CurrencyRate::with('Currency')
                ->where('from', $user_currency)
                ->get();
            $response = [];
            foreach ($modelCurrencyRates as $modelCurrencyRate) {
                $response[$modelCurrencyRate->to] =
                    [
                        "rate" => number_format($modelCurrencyRate->rate * $modelCurrencyRate->multiplier, 4, '.'),
                        "symbol" => $modelCurrencyRate->Currency->symbol
                    ];
            }
            return response()->json($response);

        }
        return response()->json(['error', __('messages.Api.bad.error')], 400);
    }
}
