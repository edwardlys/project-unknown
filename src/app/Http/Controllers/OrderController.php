<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Orders';

        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('orders.index', compact('title', 'orders'));
    }
}