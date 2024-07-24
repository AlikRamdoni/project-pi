<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;

class CartCountMiddleware
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $cartCount = $this->cartService->getCartCount();
            view()->share('cartCount', $cartCount);
        } else {
            view()->share('cartCount', 0);
        }

        return $next($request);
    }
}
