@extends('layouts.app')

@section('title','Cart - ShopHub')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Your Cart</h2>
    @if(count($cartItems) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>${{ $item->product->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ $item->product->price * $item->quantity }}</td>
                <td>
                    <form method="POST" action="{{ url('/cart/remove/'.$item->id) }}">
                        @csrf
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/checkout') }}" class="btn btn-primary float-end">Proceed to Checkout</a>
    @else
    <p>Your cart is empty. <a href="{{ url('/shop') }}">Shop Now</a></p>
    @endif
</div>
@endsection
