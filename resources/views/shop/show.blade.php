@extends('layouts.app')

@section('title', $product->name)

@section('content')

<style>
/* Cart Badge & Toast Styles */
.cart-badge {
    position: fixed;
    top: 20px;
    right: 30px;
    background: linear-gradient(45deg, #0d6efd, #6610f2);
    color: #fff;
    padding: 10px 15px;
    border-radius: 50%;
    font-weight: bold;
    z-index: 999;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
}

.cart-badge:hover {
    transform: scale(1.1);
}

.toast-msg {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(45deg, #198754, #20c997);
    color: #fff;
    padding: 12px 18px;
    border-radius: 8px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
    z-index: 999;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.toast-msg.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div id="cartCount" class="cart-badge">0</div>
<div id="toast" class="toast-msg">✅ Added to Cart</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <h4 class="text-success">₹ {{ $product->price }}</h4>

            <p class="text-muted mt-3">
                High-quality product with best performance and durability.
            </p>

            <button id="addCartBtn" class="btn btn-success btn-lg mt-3">
                🛒 Add to Cart
            </button>

            <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary mt-3 ms-2">
                ← Back to Shop
            </a>
        </div>
    </div>
</div>

<script>
// Cart functionality
let cart = 0;
const cartCount = document.getElementById('cartCount');
const toast = document.getElementById('toast');

document.getElementById('addCartBtn').addEventListener('click', () => {
    cart++;
    cartCount.innerText = cart;

    // Bounce animation
    cartCount.style.animation = 'none';
    setTimeout(() => cartCount.style.animation = 'bounce 0.5s ease', 10);

    // Show toast
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 1200);
});

// Bounce keyframe animation
const style = document.createElement('style');
style.innerHTML = `
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}`;
document.head.appendChild(style);
</script>

@endsection
