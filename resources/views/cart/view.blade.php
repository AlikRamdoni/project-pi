<x-navbar></x-navbar>
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Nama Produk</th>
                    <th class="py-2">Jumlah</th>
                    <th class="py-2">Harga</th>
                    <th class="py-2">Gambar</th>
                    <th class="py-2">Total</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr class="bg-gray-100 border-b">
                        <td class="py-2 px-4">{{ $item->menu->name }}</td>
                        <td class="py-2 px-4">
                            <form action="{{ route('cart.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-16 border-gray-300 rounded-md">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Atur
                                </button>
                            </form>
                        </td>
                        <td class="py-2 px-4">Rp.{{ number_format($item->menu->price, 0, ',', '.') }}</td>

                        <td class="py-2 px-4">
                            <img src="{{ $item->menu->image_url }}" class="h-28 w-28 bg-cover" />
                        </td>

                        <td class="py-2 px-4">Rp.{{ number_format($item->menu->price * $item->quantity, 0, ',','.') }}</td>

                        <td class="py-2 px-4">
                            <form action="{{ route('cart.delete', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-data="{ isOpen: false }">
        <!-- Modal Pembayaran -->
        <div x-show="isOpen" class="fixed inset-0 overflow-y-auto px-4 py-6 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
            <div x-show.transition.opacity.duration.300ms="isOpen" class="bg-white rounded-lg shadow-lg overflow-hidden max-w-2xl w-full">
                <div class="px-6 py-4">
                    <h2 class="text-xl font-semibold mb-4">Detail Pembayaran</h2>
                    @if ($cartItems->count() > 0)
                    <div>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="py-2">Nama Produk</th>
                                    <th class="py-2">Jumlah</th>
                                    <th class="py-2">Harga</th>
                                    <th class="py-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($cartItems as $item)
                                @php
                                    $totalPrice += $item->menu->price * $item->quantity;
                                @endphp
                                    <tr class=" border-b">
                                        <td class="py-2 px-4">{{ $item->menu->name }}</td>
                                        <td class="py-2 px-4">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="py-2 px-4">Rp.{{ number_format($item->menu->price, 0, ',','.' ) }}</td>
                                        <td class="py-2 px-4">Rp.{{ number_format($item->menu->price * $item->quantity, 0, ',','.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 flex justify-between">
                            <h3 class="text-xl font-semibold">Total Harga: </h3>
                            <h1 class="font-bold">Rp {{ number_format($totalPrice, 2) }}</h1>
                        </div>

                        <div class="font-bold">
                            <h1 class="font-bold text-green-500"> Silahkan melakukan pembayaran ke toko!</h1>
                            <a href="/find" class="underline">Alamat Toko</a>
                        </div>

                    </div>
                    @endif
                    @if ($cartItems->count() == 0) 
                    <p class="text-center">Keranjang kosong.</p>
                    <p class="text-center">Silahkan Pesan terlebih dahulu.</p>
                    @endif
                </div>
                <div class="px-6 py-4 bg-gray-100 flex justify-end">
                    <button @click="isOpen = false" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">Tutup</button>
                    <button @click="isOpen = false" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">Tutup</button>
                </div>
            </div>
        </div>
    
        <!-- Tombol Pembayaran -->
        <div class="mt-8 flex justify-center">
            <button @click.prevent="isOpen = true; updateCart()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Detail Pemesanan
            </button>
        </div>
    </div>
</div>
@endsection
