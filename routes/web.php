<?php

use App\Http\Controllers\BinanceController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/abc', function () {
    // BinanceJob::dispatch(22);
    Blog::create(['name' => 'mahna']);
    // Redis::set('name', 'farzane', 'EX', 10);
    dd(11);
});

Route::get('/create', [BinanceController::class, 'create']);


Route::get('/binance', [BinanceController::class, 'getAll']);

Route::get('/send', function () {
//    event(new \App\Events\SendMessage('3'));
    return view('welcome');
});

