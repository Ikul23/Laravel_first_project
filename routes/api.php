<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API маршруты для продуктов
Route::apiResource('products', ProductController::class);

// Тестовый маршрут
Route::get('test', function () {
    return response()->json(['status' => 'ok']);
})->middleware('api')->withoutMiddleware(['auth:api', 'auth', 'auth:sanctum']);
