@extends('layouts.app')

@section('title', $product['name'] ?? 'Product Details')

@section('content')

<style>
/* Page Background with Enhanced Gradient */
body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 50%, #667eea 100%);
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    color: #333;
}

/* Container Fade In Animation */
.product-container {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease-out forwards;
}

/* Product Image & Carousel with Glow Effect */
.product-image {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    transition: transform 0.4s ease, box-shadow 0.4s ease, filter 0.4s ease;
    filter: brightness(1);
}
.product-image:hover {
    transform: scale(1.08) rotate(1deg);
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
    filter: brightness(1.1);
}

/* Thumbnail Images */
.thumbnail-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 12px;
    margin-right: 10px;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    border: 3px solid transparent;
    filter: brightness(0.9);
}
.thumbnail-img:hover {
    transform: scale(1.15);
    border-color: #0d6efd;
    box-shadow: 0 8px 20px rgba(13,110,253,0.4);
    filter: brightness(1.1);
}
.thumbnail-img.active {
    border-color: #0d6efd;
    box-shadow: 0 5px 15px rgba(13,110,253,0.3);
}

/* Product Info */
.product-info h2 {
    color: #2c3e50;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    animation: fadeInDown 1s ease-out;
    font-weight: 700;
    margin-bottom: 1rem;
}
.product-info p {
    color: #555;
    line-height: 1.7;
    font-size: 1.1rem;
}

/* Price Styling */
.price {
    font-size: 2rem;
    font-weight: bold;
    color: #28a745;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    margin-bottom: 1.5rem;
}

/* Buttons */
.btn-custom {
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    font-size: 1.2rem;
    padding: 14px 30px;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(40,167,69,0.3);
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.btn-custom:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 25px rgba(40,167,69,0.4);
    color: white;
}

.btn-order {
    background: linear-gradient(45deg, #007bff, #6610f2);
    box-shadow: 0 5px 20px rgba(0,123,255,0.3);
}
.btn-order:hover {
    box-shadow: 0 10px 25px rgba(0,123,255,0.4);
}

/* Reviews Section */
.reviews-section {
    margin-top: 3rem;
    padding: 2rem;
    background: rgba(255,255,255,0.9);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    animation: fadeInUp 1s ease-out 0.5s both;
}
.reviews-section h3 {
    color: #2c3e50;
    margin-bottom: 2rem;
    font-weight: 700;
}
.review-item {
    border-bottom: 1px solid #eee;
    padding: 1rem 0;
    animation: fadeInLeft 0.8s ease-out both;
}
.review-item:last-child {
    border-bottom: none;
}
.review-stars {
    color: #ffc107;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}
.review-author {
    font-weight: bold;
    color: #007bff;
}
.review-date {
    color: #777;
    font-size: 0.9rem;
}

/* Order details section (address + payment method) */
.order-details {
    margin-top: 2rem;
    padding: 2rem;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    animation: fadeInUp 1s ease-out 0.7s both;
    display: none;
}
.order-details h3 {
    color: #2c3e50;
    margin-bottom: 2rem;
    font-weight: 700;
}
.order-details label {
    font-weight: 600;
}

/* Sections that switch */
.card-section, .cod-only, .card-only {
    display: none;
}

/* Toast Notification */
#toast {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #28a745;
    color: white;
    padding: 15px 25px;
    border-radius: 50px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.5s ease;
    z-index: 9999;
}
#toast.show {
    opacity: 1;
    transform: translateY(0);
}

/* Animations */
@keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
@keyframes fadeInDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
@keyframes fadeInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }

/* Responsive Enhancements */
@media (max-width: 768px) {
    .product-info { margin-top: 20px; }
    .thumbnail-img { width: 60px; height: 60px; margin-right: 5px; }
    .btn-custom { font-size: 1rem; padding: 12px 20px; }
    .reviews-section, .order-details { padding: 1rem; }
}
</style>

<div class="container my-5 product-container">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img id="mainImage" src="{{ $product['image'] ?? asset('images/default-product.jpg') }}" 
                 alt="{{ $product['name'] ?? 'Product Image' }}" 
                 class="img-fluid rounded shadow product-image mb-3">

            @if(!empty($product['images']) && count($product['images']) > 1)
            <div class="d-flex flex-wrap">
                @foreach($product['images'] as $index => $img)
                    <img src="{{ $img }}" class="thumbnail-img {{ $index == 0 ? 'active' : '' }}" onclick="changeImage(this)">
                @endforeach
            </div>
            @endif
        </div>

        <div class="col-md-6 product-info">
            <h2 class="mb-3">{{ $product['name'] ?? 'Product Name' }}</h2>
            <p class="price">₹{{ number_format($product['price'] ?? 0, 2) }}</p>
            <p class="mb-4">{{ $product['description'] ?? 'No description available.' }}</p>
            
            <!-- Add to Cart and Order Now Buttons -->
            <div class="d-flex flex-column flex-sm-row gap-3">
                <button class="btn btn-custom" id="addToCartBtn"
                        data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}"
                        data-price="{{ $product['price'] }}">
                    Add to Cart
                </button>
                <button type="button" class="btn btn-custom btn-order" onclick="showOrderDetails()">
                    Order Now
                </button>
            </div>
        </div>
    </div>

    <!-- Customer Reviews Section -->
    <div class="reviews-section">
        <h3>Customer Reviews</h3>
        @if(!empty($reviews))
            @foreach($reviews as $review)
                <div class="review-item">
                    <div class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                        @endfor
                    </div>
                    <p>{{ $review['comment'] }}</p>
                    <div class="d-flex justify-content-between">
                        <span class="review-author">{{ $review['author'] }}</span>
                        <span class="review-date">{{ $review['date'] }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <p>No reviews yet. Be the first to review!</p>
        @endif
    </div>

    <!-- ORDER DETAILS SECTION -->
    <div class="order-details" id="orderDetails">
        <h3>Order details</h3>
        <form id="orderForm" action="{{ route('order.place', $product['id'] ?? 1) }}" method="POST">
            @csrf

            <!-- SHIPPING / ADDRESS -->
            <div class="mb-3">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address_line">Address line</label>
                <input type="text" name="address_line" id="address_line" class="form-control" required>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="pincode">Pincode</label>
                    <input type="text" name="pincode" id="pincode" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <!-- PAYMENT METHOD -->
            <div class="mb-4">
                <label class="d-block">Payment method:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="pm_card" value="card" checked>
                    <label class="form-check-label" for="pm_card">Card Payment</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="pm_cod" value="cod">
                    <label class="form-check-label" for="pm_cod">Cash On Delivery</label>
                </div>
            </div>

            <!-- CARD FIELDS -->
            <div class="card-only">
                <h5>Card details</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="card_number" class="form-control" placeholder="Card Number">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" name="expiry" class="form-control" placeholder="MM/YY">
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" name="cvv" class="form-control" placeholder="CVV">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" name="name_on_card" class="form-control" placeholder="Cardholder Name">
                </div>
            </div>

            <!-- COD INFO FOR USER -->
            <div class="cod-only">
                <h5>Cash On Delivery</h5>
                <p class="mb-3">You will pay in cash when the product is delivered to your address.</p>
            </div>

            <!-- Place Order -->
            <button type="submit" class="btn btn-custom btn-order w-100">Place Order</button>
        </form>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast"></div>

<script>

/* Thumbnail click changes main image */
function changeImage(element) {
    document.getElementById('mainImage').src = element.src;
    document.querySelectorAll('.thumbnail-img').forEach(img => img.classList.remove('active'));
    element.classList.add('active');
}

/* Show order details section */
function showOrderDetails() {
    const order = document.getElementById('orderDetails');
    order.style.display = 'block';
    order.scrollIntoView({ behavior: 'smooth' });
}

/* Add to Cart via AJAX */
document.getElementById('addToCartBtn').addEventListener('click', function() {
    const id = this.dataset.id;
    const name = this.dataset.name;
    const price = this.dataset.price;

    fetch("{{ route('cart.add') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ id: id, name: name, price: price, qty: 1 })
    })
    .then(res => res.json())
    .then(data => {
        const toast = document.getElementById('toast');
        toast.innerText = data.success;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 1500);

        // Optional: Update cart count badge
        if(document.getElementById('cartCount')) {
            document.getElementById('cartCount').innerText = data.cartCount;
        }
    })
    .catch(err => console.error(err));
});

/* Switch between card fields and COD info */
document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const isCard = this.value === 'card';
        document.querySelectorAll('.card-only').forEach(el => el.style.display = isCard ? 'block' : 'none');
        document.querySelectorAll('.cod-only').forEach(el => el.style.display = isCard ? 'none' : 'block');
    });
});

// Initialize display
document.querySelector('input[name="payment_method"]:checked').dispatchEvent(new Event('change'));

</script>

@endsection
