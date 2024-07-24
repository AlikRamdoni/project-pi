<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {   
        $user = User::find(Auth::id());

        if($user->usertype != 'admin') {
            return redirect("/menu");
        }
        return view('admin.dashboard');
    }

    public function productContent()
    {
        // Contoh: Ambil dan kirimkan konten produk ke view
        $products = Menu::all(); // Misalnya, ambil semua produk dari model Product
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function transactionContent()
    {
        // Contoh: Ambil dan kirimkan konten transaksi ke view
        $transactions = Transaction::all(); // Misalnya, ambil semua transaksi dari model Transaction
        return view('admin.transaction.index', compact('transactions'));
    }

    public function users()
    {
        // Ambil data pengguna dari database dan kirim ke view
        
            return view('admin.users', compact('users'));
    }
}