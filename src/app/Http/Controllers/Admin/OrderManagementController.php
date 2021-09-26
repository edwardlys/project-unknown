<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Orders Management';
        
        $orders = Order::all();

        return view('orders.index', compact('title', 'orders'));
    }

    public function complete(Request $request, Order $order)
    {
        $order->status = Order::STATUS_COMPLETED;
        $order->save();

        return redirect()
                ->back()
                ->with('success', 'Order has been marked as complete!');
    }
}