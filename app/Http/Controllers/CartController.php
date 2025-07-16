<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        $item = [
            'id' => $id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
        ];

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->qty;
        } else {
            $cart[$id] = $item;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Berhasil ditambahkan ke keranjang!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Item dihapus dari keranjang.');
    }
}
