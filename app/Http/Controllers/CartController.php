<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view () {
        $cart = Cart::current();
        $items = $cart->items;
        return view('carts.show')
            ->withCart($cart)
            ->withItems($items);
    }

    public function removeFromCart (Request $request, Item $item) {
        $object = $item->object;
        Cart::current()->remove($object, $request->quantity);
        return back();
    }

    public function checkout () {
        $cart = Cart::current();
        // TODO: Checkout ...
        return redirect()->route('home');
    }

    public function clearCart () {
        Cart::current()->clear();
        return back();
    }
}
