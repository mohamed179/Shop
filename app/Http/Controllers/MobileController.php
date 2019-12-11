<?php

namespace App\Http\Controllers;

use App\Mobile;
use App\Cart;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index () {
        $mobiles = Mobile::paginate(24);
        return view('mobiles.index')
            ->withMobiles($mobiles);
    }

    public function show (Mobile $mobile) {
        return view('mobiles.show')
            ->withBook($mobile);
    }

    public function addToCart (Request $request, Mobile $mobile) {
        Cart::current()->add($mobile, $request->quantity);
        return back();
    }
}
