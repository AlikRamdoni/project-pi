<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        return view('admin.result.index', compact('transactions'));
    }

    public function get() {
        $transactions = Cart::with(['menu', 'user'])
                            ->orderBy('updated_at', 'desc')
                            ->get()
                            ->groupBy('user_id');

        return response()->json($transactions);
    }

    public function getDetailTransaction(Request $request, $userId)
    {
        
        
        // Mendapatkan detail keranjang berdasarkan user_id
        $detailCartUser = Cart::where('user_id', $userId)->with('menu', 'user')->get();

        // Lakukan sesuatu dengan $detailCartUser, seperti mengembalikannya sebagai response
        return response()->json($detailCartUser);
    }

    public function destroyTransactionByUserId(Request $request, $userId, $totalPrice)
{
    DB::beginTransaction();


    try {
        // Menghapus transaksi berdasarkan user ID (sesuaikan logika dengan kebutuhan)
        // Jika tujuan sebenarnya adalah mencatat transaksi, maka gunakan create()
        Transaction::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
        ]);

        // Menghapus data cart berdasarkan user ID
        Cart::where('user_id', $userId)->delete();

        DB::commit();
        return response()->json(['success' => true]);
    } catch (\Throwable $th) {
        DB::rollBack();
        // Log error atau tampilkan error yang lebih deskriptif
        return response()->json(['success' => false, 'message' => $th->getMessage()]);
    }
}
public function getAllTransactions() {

    $transactions = Transaction::with('user')->get();

    return response()->json($transactions);
}
}
