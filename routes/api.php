<?php

use App\Http\Controllers\api\APICurrencyConversionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//API метод конвертации валюты
Route::group(['prefix' => 'v1'], function() {
    Route::post('converter/{user_currency}', APICurrencyConversionController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//если произойдет ошибка в юрл можно вернуть вьюшку
Route::fallback(function () {
    return "Такой страницы не существует!";
});
