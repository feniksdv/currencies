<?php

namespace App\Http\Controllers\api;

use App\Services\Api\ApiCurrencyConversionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class APICurrencyConversionController extends Controller
{
    /**
     * Контроллер одного действия, возвращает данные из сервиса
     *
     * @param ApiCurrencyConversionService $apiCurrencyConversionService
     * @param $user_currency
     * @return JsonResponse
     */
    public function __invoke(ApiCurrencyConversionService $apiCurrencyConversionService, $user_currency)
    {
        return $apiCurrencyConversionService->getCurrencyValue($user_currency);
    }
}
