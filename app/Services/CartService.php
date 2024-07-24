<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getCartCount()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->get();
            $totalItem = 0;

            foreach($carts as $cart) {
                $totalItem += $cart->quantity;
            }

            return $totalItem;

            // return Cart::where('user_id', Auth::id())->count();
        }
        return 0;
    }
}
