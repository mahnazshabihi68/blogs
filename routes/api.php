<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketController;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/index', [BlogController::class, 'index']);
    Route::get('/show/{id}', [BlogController::class, 'show']);
    Route::post('/create', [BlogController::class, 'create']);
    Route::post('/update/{id}', [BlogController::class, 'update']);
    Route::post('/delete/{id}', [BlogController::class, 'delete']);
});

Route::get('/markets', [MarketController::class, 'index']);
