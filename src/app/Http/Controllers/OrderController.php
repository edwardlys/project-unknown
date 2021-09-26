<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Orders';

        $orders = Order::all();

        return view('orders.index', compact('title', 'orders'));
    }
}