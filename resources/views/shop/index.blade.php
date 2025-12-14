@extends('layouts.app')

@section('title', 'Shop')

@section('content')

<style>
/* Enhanced Styles for Beauty and Animations */
body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
}

.product-card {
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease-out forwards;
}

.product-card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
}

.product-card img {
    height: 220px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.product-card:hover img {
    transform: scale(1.1);
}

.category-title {
    border-left: 6px solid #0d6efd;
    padding-left: 12px;
    margin: 60px 0 25px;
    font-weight: bold;
    color: #333;
    animation: slideInLeft 0.8s ease-out;
}

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
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
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
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    z-index: 999;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.toast-msg.show {
    opacity: 1;
    transform: translateY(0);
}

.btn-success {
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    transition: all 0.3s ease;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
}

h2 {
    color: #333;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    animation: fadeInDown 1s ease-out;
}

/* Keyframe Animations */
@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-card { margin-bottom: 20px; }
    .cart-badge { top: 10px; right: 10px; padding: 8px 12px; }
    .toast-msg { bottom: 10px; right: 10px; left: 10px; text-align: center; }
}
</style>

<div id="cartCount" class="cart-badge">0</div>
<div id="toast" class="toast-msg">✅ Added to Cart</div>

<h2 class="text-center mb-5 fw-bold">🛒 Shop Products</h2>

@php
function renderProducts($images, $title, $min, $max) {
    echo "<h3 class='category-title'>$title</h3><div class='row'>";
    foreach ($images as $i => $img) {
        $delay = ($i % 6) * 0.1; // Stagger animation delays
        echo "
        <div class='col-md-4 mb-4'>
            <a href='".route('shop.show', $i+1)."' style='text-decoration:none;color:inherit;'>
                <div class='card product-card' style='animation-delay: {$delay}s; cursor:pointer;'>
                    <img src='$img' class='card-img-top'>
                    <div class='card-body text-center'>
                        <h5>Product ".($i+1)."</h5>
                        <p class='fw-bold text-success'>₹".rand($min,$max)."</p>
                    </div>
                </div>
            </a>
        </div>";
    }
    echo "</div>";
}
@endphp

{{-- Render Products --}}
@php renderProducts([
    'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
    'https://images.unsplash.com/photo-1580894908361-967195033215',
    'https://images.unsplash.com/photo-1585386959984-a41552231692',
    'https://images.unsplash.com/photo-1611078489935-0cb964de46d6',
    'https://images.unsplash.com/photo-1606813909355-d6b3e1c33c2b'
], '📱 Electronics', 5000, 60000); @endphp

@php renderProducts([
    'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47',
    'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb',
    'https://images.unsplash.com/photo-1520975916090-3105956dac38',
    'https://images.unsplash.com/photo-1542060748-10c28b62716c',
    'https://images.unsplash.com/photo-1512436991641-6745cdb1723f',
    'https://images.unsplash.com/photo-1542060748-10c28b62716c'
], '👗 Fashion', 999, 4999); @endphp

@php renderProducts([
    'https://images.unsplash.com/photo-1601758125946-6ec2ef64daf8',
    'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1',
    'https://images.unsplash.com/photo-1594736797933-d0401ba2fe65',
    'https://images.unsplash.com/photo-1586880244406-556ebe35f282',
    'https://images.unsplash.com/photo-1603112579969-bb8e83d2e0cc',
    'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f'
], '🧸 Toys', 399, 2999); @endphp

@php renderProducts([
    'https://images.unsplash.com/photo-1512820790803-83ca734da794',
    'https://images.unsplash.com/photo-1524985069026-dd778a71c7b4',
    'https://images.unsplash.com/photo-1507842217343-583bb7270b66',
    'https://images.unsplash.com/photo-1528207776546-365bb710ee93',
    'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c',
    'https://images.unsplash.com/photo-1495446815901-a7297e633e8d'
], '📚 Books', 199, 999); @endphp

@php renderProducts([
    'https://images.unsplash.com/photo-1542838132-92c53300491e',
    'https://images.unsplash.com/photo-1586201375754-1421e85b5c22',
    'https://images.unsplash.com/photo-1604908554265-3f14b21cfc3e',
    'https://images.unsplash.com/photo-1587049352846-4a222e784d38',
    'https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2',
    'https://images.unsplash.com/photo-1585238342028-4bbc48a8f93b'
], '🥦 Grocery', 99, 799); @endphp

<script>
// Cart & Toast Animations
let cart = 0;
document.querySelectorAll('.add-cart').forEach(btn => {
    btn.onclick = () => {
        cart++;
        document.getElementById('cartCount').innerText = cart;
        // Add bounce animation to cart badge
        const cartCount = document.getElementById('cartCount');
        cartCount.style.animation = 'none';
        setTimeout(() => cartCount.style.animation = 'bounce 0.5s ease', 10);
        // Show toast with animation
        const toast = document.getElementById('toast');
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 1200);
    };
});

// Bounce Keyframe
const style = document.createElement('style');
style.innerHTML = `
@keyframes bounce {
    0%,20%,50%,80%,100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}`;
document.head.appendChild(style);
</script>

@endsection
