<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'product')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function get() {
        $transactions = Cart::with(['menu', 'user'])
                            ->orderBy('updated_at', 'desc')
                            ->get()
                            ->groupBy('user_id');

        return response()->json($transactions);
    }
}
