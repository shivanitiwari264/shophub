@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')

<style>
/* Background */
.order-bg {
    min-height: 90vh;
    background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Card */
.order-card {
    background: #fff;
    border-radius: 25px;
    padding: 3rem;
    max-width: 600px;
    width: 100%;
    text-align: center;
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    animation: fadeInUp 0.9s ease forwards;
}

/* Success Icon */
.success-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(45deg, #28a745, #20c997);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 30px rgba(40,167,69,0.4);
    animation: pop 0.6s ease;
}

/* Title */
.order-card h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 1rem;
}

/* Text */
.order-card p {
    color: #555;
    font-size: 1.05rem;
}

/* Order Details */
.order-details {
    text-align: left;
    margin-top: 2rem;
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 15px;
}

.order-details div {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.8rem;
    font-weight: 500;
}

/* Buttons */
.order-actions {
    margin-top: 2.5rem;
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-custom {
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}

.btn-home {
    background: linear-gradient(45deg, #007bff, #6610f2);
    color: #fff;
}

.btn-home:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,123,255,0.4);
}

.btn-orders {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: #fff;
}

.btn-orders:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(40,167,69,0.4);
}

/* Animations */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes pop {
    0% { transform: scale(0.6); }
    100% { transform: scale(1); }
}
</style>

<div class="order-bg">
    <div class="order-card">

        <div class="success-icon">
            ✔
        </div>

        <h2>Order Placed Successfully!</h2>

        <p>
            Thank you for shopping with <strong>ShopHub</strong> 🎉  
            Your order has been confirmed and is being processed.
        </p>

        <!-- Order Details -->
        <div class="order-details">
            <div>
                <span>Order ID:</span>
                <span>#{{ $orderId ?? 'SH123456' }}</span>
            </div>
            <div>
                <span>Product:</span>
                <span>{{ $product['name'] ?? 'Smartphone XYZ' }}</span>
            </div>
            <div>
                <span>Total Amount:</span>
                <span class="text-success fw-bold">
                    ₹{{ number_format($product['price'] ?? 29999, 2) }}
                </span>
            </div>
            <div>
                <span>Payment Method:</span>
                <span>{{ $paymentMethod ?? 'Cash on Delivery' }}</span>
            </div>
            <div>
                <span>Status:</span>
                <span class="text-success">Confirmed</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="order-actions">
            <a href="{{ route('home') }}" class="btn btn-custom btn-home">
                Continue Shopping
            </a>
            <a href="#" class="btn btn-custom btn-orders">
                View My Orders
            </a>
        </div>

    </div>
</div>

@endsection
