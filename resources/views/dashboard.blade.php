<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | ShopHub</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); color: #333; }
    .navbar { background: linear-gradient(90deg, #667eea 0%, #764ba2 100%) !important; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .navbar-brand { font-size: 1.8rem; font-weight:700; transition: transform 0.3s ease; }
    .navbar-brand:hover { transform: scale(1.05); }
    .nav-link { display:flex; align-items:center; gap:5px; transition: color 0.3s ease, transform 0.3s ease; }
    .nav-link:hover { color:#ff6b6b !important; transform:translateY(-2px); }
    .search-bar { max-width:300px; border-radius:25px; border:none; box-shadow:0 2px 4px rgba(0,0,0,0.1); }
    .search-bar:focus { box-shadow:0 4px 8px rgba(0,0,0,0.2); }
    .btn-light { border-radius:25px; background:linear-gradient(45deg,#ffffff,#f8f9fa); border:none; transition: transform 0.3s ease; }
    .btn-light:hover { transform: scale(1.05); }

    .hero-section { background: linear-gradient(135deg, #2575fc, #6a11cb); color:white; min-height:50vh; display:flex; align-items:center; justify-content:center; text-align:center; border-radius:15px; margin:20px 0; position:relative; }
    .hero-section h1 { font-size:3rem; font-weight:700; animation:fadeInUp 1s ease-out; }
    .hero-section p { font-size:1.2rem; margin:1rem 0; animation:fadeInUp 1.2s ease-out; }
    .btn-primary { background: linear-gradient(45deg,#ff6b6b,#feca57); border:none; padding:12px 30px; font-weight:600; transition: transform 0.3s ease, box-shadow 0.3s ease; animation: fadeInUp 1.4s ease-out; }
    .btn-primary:hover { transform: translateY(-3px) scale(1.05); box-shadow:0 8px 15px rgba(0,0,0,0.2); }

    .features { padding:5rem 0; }
    .feature-card { padding:2rem; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; text-align:center; cursor:pointer; margin-bottom:2rem; }
    .feature-card:hover { transform: translateY(-10px); }
    .feature-card i{ font-size:3rem; margin-bottom:10px; transition: transform 0.3s ease, color 0.3s ease; }
    .feature-card:hover i { transform: scale(1.2) rotate(10deg); }

    .featured-products { padding:5rem 0; background:#e9ecef; }
    .product-card { background:white; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.1); overflow:hidden; transition: transform 0.3s ease; margin-bottom:2rem; }
    .product-card:hover { transform: translateY(-10px); box-shadow:0 20px 40px rgba(0,0,0,0.2); }
    .product-card img { width:100%; height:200px; object-fit:cover; }
    .product-card .card-body { padding:1rem; }
    .product-card .card-title { font-weight:600; color:#667eea; }

    .testimonials { padding:5rem 0; background:#f8f9fa; }
    .testimonial-card { background:#fff9c4; padding:2rem; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.1); }
    .testimonial-card p{ font-style:italic; }
    .testimonial-card small{ display:block; margin-top:1rem; font-weight:600; }

    .footer { background: linear-gradient(90deg,#2c3e50 0%,#34495e 100%); color:white; padding:4rem 0; }
    .footer input{ padding:10px 15px; border-radius:25px; border:none; margin-right:10px; width:250px; }
    .footer button{ border-radius:25px; background:#ff6b6b; color:white; border:none; padding:10px 20px; transition: transform 0.3s ease; }
    .footer button:hover{ transform: scale(1.05); }
    .social-links { display:flex; justify-content:center; gap:20px; margin-bottom:1rem; }
    .social-links a{ color:white; font-size:1.5rem; transition: transform 0.3s ease, color 0.3s ease; }
    .social-links a:hover{ transform: scale(1.3) rotate(5deg); color:#ff6b6b; }

    #notification { position: fixed; bottom: 20px; right: 20px; background: linear-gradient(45deg,#ff6b6b,#feca57); color: #fff; padding: 15px 25px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.2); z-index: 9999; display: flex; align-items: center; gap: 10px; font-weight: 600; animation: fadeIn 1s ease; }
    #notification button { background: rgba(255,255,255,0.2); border: none; color: #fff; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-weight: 600; }

    @keyframes fadeIn { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    @keyframes fadeInUp { from{opacity:0; transform:translateY(30px);} to{opacity:1; transform:translateY(0);} }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="fas fa-store"></i> ShopHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link active" href="/"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/shop"><i class="fas fa-th-large"></i> Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard"><i class="fas fa-user"></i> Dashboard</a></li>
                <li class="nav-item">
                    <form class="d-flex ms-3" role="search">
                        <input class="form-control search-bar" type="search" placeholder="Search products...">
                        <button class="btn btn-light ms-2" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero-section text-center">
    <div class="container">
        <h1>Welcome, {{ auth()->user()->name }} 👋</h1>
        <p>Explore your ShopHub dashboard and latest products!</p>
        <a href="/shop" class="btn btn-primary btn-lg mt-3">Start Shopping</a>
    </div>
</section>

<!-- FEATURES -->
<section class="features">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3" data-aos="fade-up">
                <div class="feature-card"><i class="fas fa-shopping-cart"></i><h4>Cart</h4><p>View & manage your shopping cart.</p></div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card"><i class="fas fa-heart"></i><h4>Wishlist</h4><p>Your favorite products.</p></div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card"><i class="fas fa-box"></i><h4>Orders</h4><p>Check your order history.</p></div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card"><i class="fas fa-cog"></i><h4>Settings</h4><p>Manage account settings.</p></div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="featured-products">
    <div class="container text-center">
        <h2 data-aos="fade-up">Featured Products</h2>
        <div class="row mt-4">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Product 1">
                    <div class="card-body"><h5 class="card-title">Wireless Headphones</h5><p>$99.99</p><a href="#" class="btn btn-primary">Add to Cart</a></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Product 2">
                    <div class="card-body"><h5 class="card-title">Smart Watch</h5><p>$199.99</p><a href="#" class="btn btn-primary">Add to Cart</a></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Product 3">
                    <div class="card-body"><h5 class="card-title">Gaming Mouse</h5><p>$49.99</p><a href="#" class="btn btn-primary">Add to Cart</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
    <div class="container text-center">
        <h2 data-aos="fade-up">Customer Reviews</h2>
        <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial-card mx-auto" style="max-width:600px;">
                        <p>"Amazing products! Fast delivery and excellent quality."</p>
                        <small>- John Doe</small>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial-card mx-auto" style="max-width:600px;">
                        <p>"I love shopping at ShopHub. Highly recommended!"</p>
                        <small>- Jane Smith</small>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer text-center">
    <div class="container">
        <h5>Subscribe to our Newsletter</h5>
        <form class="d-flex justify-content-center mt-3 mb-4">
            <input type="email" placeholder="Enter your email">
            <button type="submit">Subscribe</button>
        </form>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <p>© 2025 ShopHub. All rights reserved. | <a href="#" class="text-white">Privacy Policy</a> | <a href="#" class="text-white">Terms of Service</a></p>
    </div>
</footer>

<!-- Notification -->
<div id="notification">
    <i class="fas fa-bell"></i> Welcome back, {{ auth()->user()->name }}!
    <button id="closeNotif">Close</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration:1000, once:true });
    const notif = document.getElementById('notification');
    const closeBtn = document.getElementById('closeNotif');
    closeBtn.addEventListener('click', () => { notif.style.display = 'none'; });
    setTimeout(() => { notif.style.display = 'none'; }, 7000);
</script>
</body>
</html>
