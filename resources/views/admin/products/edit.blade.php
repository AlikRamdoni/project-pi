@extends('admin.layout')

@section('content')
    <h1>Edit Product</h1>
    <!-- Trigger button for modal -->
    <button onclick="toggleModal('editaddProductModal')">Edit Product</button>

    <!-- Modal -->
    <div id="editaddProductModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
            <h2 class="text-2xl mb-4">Edit Product</h2>
            <form action="{{ route('admin.menu.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="price" value="{{ $product->price }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $product->description }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="toggleModal('editaddProductModal')" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modalID = document.getElementById(modalID);
        function toggleModal(modalID){
            const checkHiddenClass = modalID.classList.contains('hidden');
            if(checkHiddenClass) {
                modalID.classList.remove('hidden');
                modalID.classList.add('flex';)
            } else {
                modalID.classList.add('hidden');
                modalID.classList.remove('flex');
            }
            
        }
    </script>
@endsection
