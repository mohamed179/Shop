<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Country;
use App\Http\Requests\CheckoutRequest;
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

    public function checkoutShow () {
        $cart = Cart::current();
        $items = $cart->items;
        $countries = Country::all();
        return view('carts.checkout-form')
            ->withCart($cart)
            ->withItems($items)
            ->withCountries($countries);
    }

    public function checkout (CheckoutRequest $request) {
        // TODO: checkout and place order ...
        return redirect()->route('home');
    }

    public function clearCart () {
        Cart::current()->clear();
        return back();
    }
}
