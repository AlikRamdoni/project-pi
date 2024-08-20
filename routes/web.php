<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/api/cart', [CartController::class, 'get'])->name('cart.getCartUser');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('views');
    //Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    
    Route::get('/product-content', [AdminController::class, 'productContent'])->name('product.content');
    Route::get('/transaction-content', [AdminController::class, 'transactionContent'])->name('transaction.content');
    
    // // Routes for Product CRUD
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/result', [TransactionController::class, 'index'])->name('result.index');
    Route::get('/transactions', [TransactionController::class, 'get'])->name(('transactions'));
    Route::get('/transactions/delete/{userId}/t/{totalPrice}', [TransactionController::class, 'destroyTransactionByUserId'])->name('transactions.destroy');
    Route::get('/transactions/{userId}', [TransactionController::class, 'getDetailTransaction'])->name('transactions');
});

Route::get('/find', function () {
    return view('find');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/result/index', [TransactionController::class, 'index'])->name('report.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
