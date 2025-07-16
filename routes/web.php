<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/news', fn() => view('news'));
Route::get('/single-news', fn() => view('single-news'));
Route::get('/single-product', fn() => view('single-product'));
Route::get('/404', fn() => view('404'));

// SHOP
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// CART
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


// CHECKOUT
Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('checkout.process');
