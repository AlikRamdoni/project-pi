<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{
    public function update(Request $request, $id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cartItem->quantity = $request->input('quantity');
    $cartItem->save();

    return redirect()->route('cart.view')->with('success', 'Pesanan di Perbarui');
}

public function delete($id)
{
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $cartItem->delete();

    return redirect()->route('cart.view')->with('success', 'Pesanan di Hapus');
}

    
    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('menu')->get();
        return view('cart.view', compact('cartItems'));
    }

    public function get() {
        $cartItems = Cart::where('user_id', Auth::id())->with('menu')->get();
        return $cartItems;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        

        $quantity = $request->input('quantity', 1);

        $cartItem = Cart::where('user_id', Auth::id())->where('menus_id', $productId)->first();

        if ($cartItem) {
            // Update quantity if product already in cart
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Add new product to cart
            Cart::create([
                'user_id' => Auth::id(),
                'menus_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['message' =>  "Success added item to cart"]);
    }
}
