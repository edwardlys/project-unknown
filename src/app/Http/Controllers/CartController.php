<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Cart';

        $cartItems = $request->session()->get('user.cart', []);
        $cartTotalPrice = 0;

        foreach ($cartItems as $item) {
            $item->load('menuItem');
            $cartTotalPrice += $item->menuItem->price;
        }

        return view('cart', compact('title', 'cartItems', 'cartTotalPrice'));
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_item_id' => 'required|exists:menu_items,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $orderItem = new OrderItem;
        $orderItem->menu_item_id = $request->menu_item_id;

        $cartItems = $request->session()->get('user.cart');

        if (empty($cartItems)) {
            $cartItems = [];
        }
        
        $cartItems[uniqid()] = $orderItem;

        $request->session()->put('user.cart', $cartItems);

        return redirect()
            ->back()
            ->with('success', 'Added item (' . $orderItem->menuItem->name . ') to cart!');
    }

    public function remove(Request $request, string $cartItemId)
    {
        $cartItems = $request->session()->get('user.cart');

        if (empty($cartItems) || empty($cartItems[$cartItemId])) {
            return redirect()->back();
        }

        $orderItem = $cartItems[$cartItemId];
        unset($cartItems[$cartItemId]);

        $request->session()->put('user.cart', $cartItems);

        return redirect()
            ->back()
            ->with('success', 'Removed item (' . $orderItem->menuItem->name . ') from cart!');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('user.cart');

        return redirect()
            ->back()
            ->with('success', 'Cart is cleared!');
    }
}