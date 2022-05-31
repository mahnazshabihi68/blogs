<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);

        try {

            return response()->json([
                'orders' => $orders
            ]);

        } catch (Exception|GuzzleException $exception) {

            return response()->json([
                'error' => $exception->getMessage()
            ], 400);

        }
    }
}
