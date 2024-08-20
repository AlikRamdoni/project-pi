<!-- resources/views/reports/monthly_total.blade.php -->
@extends('admin.layout')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-6">Laporan Total Bulanan</h2>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                    <th class="py-3 px-6 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bulan/Tanggal</th>
                    <th class="py-3 px-6 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="py-3 px-6 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="py-4 px-6 border-b border-gray-200">
                            {{  $transaction->id }}
                        </td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            {{ $transaction->created_at->translatedFormat('d F Y, H.i') }}
                        </td>
                        
                        <td class="py-4 px-6 border-b border-gray-200">
                            {{  $transaction->User->name }}
                        </td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection