<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('components.navbar', function ($view) {
            $cartCount = app(CartService::class)->getCartCount();
            $view->with('cartCount', $cartCount);
        });
    }

    public function register()
    {
        $this->app->singleton(CartService::class, function ($app) {
            return new CartService();
        });
    }
}
