@extends('layouts.app') {{-- Sesuaikan jika kamu tidak pakai layout, atau bisa hapus baris ini --}}

@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @forelse ($cart as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['qty'];
                                    $total += $subtotal;
                                @endphp
                                <tr class="table-body-row">
                                    <td class="product-remove">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" style="background: none; border: none;">
                                                <i class="far fa-window-close text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="product-image">
                                        <img src="{{ asset('assets/img/products/product-img-1.jpg') }}" alt="" width="60">
                                    </td>
                                    <td class="product-name">{{ $item['name'] }}</td>
                                    <td class="product-price">${{ $item['price'] }}</td>
                                    <td class="product-quantity">
                                        <form action="{{ route('cart.update') }}" method="POST" style="display: flex; align-items: center;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" style="width: 60px; margin-right: 5px;">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td class="product-total">${{ $subtotal }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Keranjang kosong.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal:</strong></td>
                                <td>${{ $total }}</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping:</strong></td>
                                <td>$45</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total:</strong></td>
                                <td>${{ $total + 45 }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons mt-3">
                        <a href="{{ url('/shop') }}" class="boxed-btn">Continue Shopping</a>
                        <a href="{{ url('/checkout') }}" class="boxed-btn black">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
