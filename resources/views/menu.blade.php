<!-- resources/views/menu.blade.php -->

<x-layout>
    @extends('layouts.app')

    @section('content')
    <div class="flex p-4">
<!-- Sidebar -->
<div class="w-full md:w-1/4 lg:w-1/6 bg-white p-4 rounded-lg shadow md:sticky md:top-0">
    <h2 class="text-xl font-semibold mb-4">Kategori</h2>
    <ul>
        <li class="mb-2">
            <a href="{{ route('menu', ['category' => 'Food']) }}" class="text-blue-500 hover:underline cursor-pointer">Makanan</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('menu', ['category' => 'Beverage']) }}" class="text-blue-500 hover:underline cursor-pointer">Minuman</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('menu') }}" class="text-blue-500 hover:underline cursor-pointer">Semua</a>
        </li>
    </ul>
</div>


        <!-- Product Grid -->
        <div class="w-3/4 ml-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @foreach ($menuItems as $item)
                    @if($item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-xl font-semibold">{{ $item->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ $item->description }}</p>
                                <p class="text-gray-800 font-bold mt-2">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                <button class="add-to-cart bg-blue-600 px-2.5 py-1 rounded text-white font-bold" data-product-id="{{ $item->id }}">Tambah</button>
                            </div>
                        </div>
                    @else
                        <p>Item not found.</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var productId = $(this).data('product-id');
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
        // Tampilkan alert di tengah halaman
        var alertBox = $('<div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white p-4 rounded-md shadow-lg">Pesanan di Keranjang!</div>');
            $('body').append(alertBox);
            setTimeout(function() {
                alertBox.fadeOut('slow', function() {
                    // Setelah alert hilang, reload halaman
                    setTimeout(function() {
                        location.reload();
                    }, 500); // Contoh: Reload setelah 1 detik
                });
            }, 2000); // Tampilkan alert selama 3 detik
        },
                            error: function(xhr) {
                                alert('Failed to add product to cart. Please try again.');
                                console.log(xhr)
                            }
                        });
                    });
                });
    </script>
    @endsection
</x-layout>
