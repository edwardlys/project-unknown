<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Payment';

        $cartItems = $request->session()->get('user.cart', []);
        $cartTotalPrice = 0;

        foreach ($cartItems as $item) {
            $item->load('menuItem');
            $cartTotalPrice += $item->menuItem->price;
        }

        if ($cartTotalPrice) {
            return view('payment', compact('title', 'cartTotalPrice'));
        } else {
            return redirect()->back();
        }
    }

    public function pay(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'delivery_address' => 'required',
            'cc_pan' => 'required|integer|digits:16',
            'cc_exp_month' => 'required|date_format:m',
            'cc_exp_year' => 'required|date_format:Y',
            'cc_cvv' => 'required|integer|digits:3',
            'cc_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'delivery_address' => $request->delivery_address,
        ]);

        $cartItems = $request->session()->get('user.cart', []);
        $cartTotalPrice = 0;

        foreach ($cartItems as $item) {
            $item->load('menuItem');
            $cartTotalPrice += $item->menuItem->price;

            $item->order_id = $order->id;
            $item->save();
        }

        Payment::create([
            'order_id' => $order->id,
            'amount' => $cartTotalPrice,
            'cc_name' => $request->cc_name,
            'cc_masked_pan' => substr_replace($request->cc_pan, str_repeat('X', 8), 4, 8),
        ]);

        $request->session()->forget('user.cart');

        return redirect()
            ->route('home')
            ->with('success', 'Validation success');
    }
}