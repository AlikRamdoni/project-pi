@extends('admin.layout')

@section('content')
    <div class="text-center font-bold">
        <h1 class="text-center font-bold">Kontrol Halaman Menu dan Produk Disini!</h1>
    </div>

    <button id="createProductButton" class="bg-green-500 text-white px-4 py-2 rounded-md createProductButton" onclick="toggleModal()">Tambah Produk Baru</button>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif


    <table class="min-w-full border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 text-left">Nama</th>
                <th class="py-2 px-4 text-left">Gambar</th>
                <th class="py-2 px-4 text-left">Harga</th>
                <th class="py-2 px-4 text-left">Deskripsi</th>
                <th class="py-2 px-4 text-left">Aksi</th>
            </tr>            
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $product->image_url }}" alt="" class="h-28 w-28 bg-cover"/></td>
                    <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->description }}</td>
                    <td>

                       
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
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

    <!-- Create Modal -->
    <div id="addProductModal" class="fixed flex inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
            <h2 id="modalTitle" class="text-2xl mb-4">Tambah Produk Baru</h2>
            <form id="productForm" action="{{ route('admin.products.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="id" id="productId">
            
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="productName" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="text" name="image_url" id="productImage" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="price" id="productPrice" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-medium text-gray-700">Kategori</p>
                    <label class="inline-flex items-center">
                        <input type="radio" name="category" value="Beverage" class="form-radio text-indigo-600" checked>
                        <span class="ml-2">Minuman</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="category" value="Food" class="form-radio text-indigo-600">
                        <span class="ml-2">Makanan</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="productDescription" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded-md" onclick="toggleModal()">Cancel</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
    
@endsection
