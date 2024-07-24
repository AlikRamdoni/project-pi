<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Cart Item') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Are you sure you want to remove this item from your cart?') }}
        </p>
    </header>

    <form method="post" action="{{ route('cart.delete', $cartItem->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('delete')

        <div class="flex items-center gap-4">
            <x-danger-button>{{ __('Delete') }}</x-danger-button>

            @if (session('success') === 'Pesanan di Hapus')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Item deleted from cart.') }}</p>
            @endif
        </div>
    </form>
</section>
