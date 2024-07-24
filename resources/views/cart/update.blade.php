<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Cart Item') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update the quantity of the item in your cart.') }}
        </p>
    </header>

    <form method="post" action="{{ route('cart.update', $cartItem->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="update_cart_quantity" :value="__('Quantity')" />
            <x-text-input id="update_cart_quantity" name="quantity" type="number" class="mt-1 block w-full" :value="$cartItem->quantity" />
            <x-input-error :messages="$errors->updateCart->get('quantity')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('success') === 'Pesanan di Perbarui')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Cart updated.') }}</p>
            @endif
        </div>
    </form>
</section>
