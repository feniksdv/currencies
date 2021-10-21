<?php

namespace App\Contracts\Api;

use Illuminate\Http\JsonResponse;

interface ApiCurrencyConversion
{
    public function getCurrencyValue($user_currency): JsonResponse;
}
