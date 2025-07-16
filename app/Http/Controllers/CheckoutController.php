<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang masih kosong.');
        }

        return view('checkout', compact('cart'));
    }

    public function processPayment(Request $request)
    {
        // Validasi input form checkout
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|in:transfer,cod',
        ]);

        // Proses pembayaran (simulasi)
        session()->forget('cart'); // Kosongkan keranjang

        // Redirect ke homepage dengan pesan sukses
        return redirect('/')->with('success', 'Pembayaran berhasil! Terima kasih sudah berbelanja.');
    }
}
