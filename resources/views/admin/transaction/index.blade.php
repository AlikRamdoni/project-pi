@extends('admin.layout')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Pesanan Pembeli</h1>
    <table class="table-auto min-w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Total Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="transaction-data">
            <!-- Data transactions will be generated here -->
        </tbody>
    </table>
    <div id="detailTransactionModal" class="hidden"></div>
 
</div>

@endsection
