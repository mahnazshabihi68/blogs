<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\Interfaces\IBinanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BinanceController extends Controller 
{
    protected $iBinanceService;

    public function __construct(IBinanceService $iBinanceService)
    {
        $this->iBinanceService = $iBinanceService;
    }

    public function getAll()
    {
        $prices = $this->iBinanceService->getPrice();
        dd(Cache::get('prices'));
    }

    public function create()
    {
        Cache::has('prices');
    }
}
